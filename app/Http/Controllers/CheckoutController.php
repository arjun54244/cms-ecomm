<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Order;
// use App\Models\OrderItem;
// use App\Models\Product;
// use Illuminate\Support\Facades\DB;
// use Razorpay\Api\Api;

// class CheckoutController extends Controller
// {
//     public function index()
//     {
//         return view('checkout');
//     }

//     /**
//      * Store Guest Order
//      */
//     public function store(Request $request)
//     {
//         $request->validate([

//             'customer_name' => ['required'],

//             'email' => ['required', 'email'],

//             'phone' => ['required'],

//             'address' => ['required'],

//             'city' => ['required'],

//             'state' => ['required'],

//             'postal_code' => ['required'],

//             'cart' => ['required', 'array'],

//         ]);

//         DB::beginTransaction();

//         try {

//             $subtotal = 0;

//             foreach ($request->cart as $item) {

//                 $subtotal += $item['price'] * $item['quantity'];

//             }

//             $shipping = 0;

//             $discount = 0;

//             $tax = 0;

//             $grandTotal = $subtotal + $shipping + $tax - $discount;

//             $order = Order::create([

//                 'order_number' => 'ORD-' . now()->format('YmdHis') . rand(100, 999),

//                 'customer_name' => $request->customer_name,

//                 'email' => $request->email,

//                 'phone' => $request->phone,

//                 'address' => $request->address,

//                 'city' => $request->city,

//                 'state' => $request->state,

//                 'country' => 'India',

//                 'postal_code' => $request->postal_code,

//                 'subtotal' => $subtotal,

//                 'shipping_charge' => $shipping,

//                 'discount' => $discount,

//                 'tax' => $tax,

//                 'grand_total' => $grandTotal,

//                 'payment_method' => 'razorpay',

//                 'payment_status' => 'pending',

//                 'status' => 'pending',

//             ]);

//             foreach ($request->cart as $cart) {

//                 $product = Product::findOrFail($cart['id']);

//                 OrderItem::create([

//                     'order_id' => $order->id,

//                     'product_id' => $product->id,

//                     'product_name' => $product->name,

//                     'product_slug' => $product->slug,

//                     'image' => $product->featured_image,

//                     'price' => $cart['price'],

//                     'quantity' => $cart['quantity'],

//                     'total' => $cart['price'] * $cart['quantity'],

//                 ]);

//             }

//             $api = new Api(

//                 config('services.razorpay.key'),

//                 config('services.razorpay.secret')

//             );

//             $razorpayOrder = $api->order->create([

//                 'receipt' => $order->order_number,

//                 'amount' => $grandTotal * 100,

//                 'currency' => 'INR',

//                 'payment_capture' => 1,

//             ]);

//             $order->update([

//                 'razorpay_order_id' => $razorpayOrder['id'],

//             ]);

//             DB::commit();

//             return response()->json([

//                 'success' => true,

//                 'order_id' => $order->id,

//                 'order_number' => $order->order_number,

//                 'razorpay_order_id' => $razorpayOrder['id'],

//                 'amount' => $grandTotal * 100,

//                 'key' => config('services.razorpay.key'),

//                 'customer_name' => $order->customer_name,

//                 'email' => $order->email,

//                 'phone' => $order->phone,

//             ]);

//         } catch (\Exception $e) {

//             DB::rollBack();

//             return response()->json([

//                 'success' => false,

//                 'message' => $e->getMessage(),

//             ], 500);

//         }
//     }
// }


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function index(): View
    {
        return view('checkout');
    }

    /**
     * Create the Order + Order Items for a guest, then create a matching
     * Razorpay Order and return the details needed to open Razorpay Checkout.
     */
    public function store(Request $request): JsonResponse
    {
        $settings = \App\Models\Setting::getSettings();
        $allowedPaymentMethods = ['razorpay'];
        if ($settings && !empty($settings->enable_cod)) {
            $allowedPaymentMethods[] = 'cod';
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:500'],
            'city' => ['required', 'string', 'max:120'],
            'state' => ['required', 'string', 'max:120'],
            'postal_code' => ['required', 'string', 'max:20'],
            'customer_note' => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'string', 'in:' . implode(',', $allowedPaymentMethods)],
            'cart' => ['required', 'array', 'min:1'],
            'cart.*.id' => ['required', 'integer', 'exists:products,id'],
            'cart.*.price' => ['required', 'numeric', 'min:0'],
            'cart.*.quantity' => ['required', 'integer', 'min:1'],
            'cart.*.size'  => ['nullable', 'string', 'max:10'],
            'cart.*.color' => ['nullable', 'string', 'max:50'],
        ]);

        try {
            $order = DB::transaction(function () use ($validated) {

                $subtotal = 0;

                // Recalculate line totals server-side from the DB price, never trust client price blindly.
                $lineItems = [];

                foreach ($validated['cart'] as $cartLine) {
                    $product = Product::findOrFail($cartLine['id']);

                    $unitPrice = $product->sale_price ?? $product->price ?? $cartLine['price'];
                    $quantity = (int) $cartLine['quantity'];
                    $lineTotal = $unitPrice * $quantity;

                    $subtotal += $lineTotal;

                    $lineItems[] = [
                        'product'    => $product,
                        'unit_price' => $unitPrice,
                        'quantity'   => $quantity,
                        'line_total' => $lineTotal,
                        'size'       => $cartLine['size']  ?? null,
                        'color'      => $cartLine['color'] ?? null,
                    ];
                }

                $shippingCharge = $this->calculateShipping($subtotal);
                $discount = $this->calculateDiscount($subtotal);
                $tax = $this->calculateTax($subtotal, $discount);
                $grandTotal = round($subtotal + $shippingCharge + $tax - $discount, 2);

                $order = Order::create([
                    'order_number' => $this->generateOrderNumber(),
                    'customer_name' => $validated['customer_name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'country' => 'India',
                    'postal_code' => $validated['postal_code'],
                    'subtotal' => $subtotal,
                    'shipping_charge' => $shippingCharge,
                    'discount' => $discount,
                    'tax' => $tax,
                    'grand_total' => $grandTotal,
                    'payment_method' => $validated['payment_method'],
                    'payment_status' => 'pending',
                    'status' => $validated['payment_method'] === 'cod' ? 'confirmed' : 'pending',
                    'customer_note' => $validated['customer_note'] ?? null,
                ]);

                foreach ($lineItems as $line) {
                    /** @var Product $product */
                    $product = $line['product'];

                    OrderItem::create([
                        'order_id'       => $order->id,
                        'product_id'     => $product->id,
                        'product_name'   => $product->name,
                        'product_slug'   => $product->slug,
                        'image'          => $product->featured_image ?? null,
                        'price'          => $line['unit_price'],
                        'quantity'       => $line['quantity'],
                        'selected_size'  => $line['size']  ?? null,
                        'selected_color' => $line['color'] ?? null,
                        'total'          => $line['line_total'],
                    ]);
                }

                if ($validated['payment_method'] === 'razorpay') {
                    $razorpayOrder = $this->createRazorpayOrder($order);

                    $order->update([
                        'razorpay_order_id' => $razorpayOrder['id'],
                    ]);
                }

                return $order;
            });

            if ($order->payment_method === 'cod') {
                return response()->json([
                    'success' => true,
                    'order_id' => $order->id,
                    'order_number' => $order->order_number,
                    'payment_method' => 'cod',
                    'redirect_url' => route('order.success', $order),
                ]);
            }

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'order_number' => $order->order_number,
                'payment_method' => 'razorpay',
                'razorpay_order_id' => $order->razorpay_order_id,
                'amount' => (int) round($order->grand_total * 100),
                'key' => config('services.razorpay.key'),
                'customer_name' => $order->customer_name,
                'email' => $order->email,
                'phone' => $order->phone,
            ]);

        } catch (Throwable $e) {
            Log::error('Checkout store failed: ' . $e->getMessage(), [
                'exception' => $e,
                'payload' => $validated,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'We could not process your order right now. Please try again.',
            ], 500);
        }
    }

    /**
     * Verify the Razorpay signature and mark the order as paid.
     */
    public function paymentSuccess(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order_id' => ['required', 'integer', 'exists:orders,id'],
            'razorpay_order_id' => ['required', 'string'],
            'razorpay_payment_id' => ['required', 'string'],
            'razorpay_signature' => ['required', 'string'],
        ]);

        try {
            $order = Order::where('id', $validated['order_id'])
                ->where('razorpay_order_id', $validated['razorpay_order_id'])
                ->firstOrFail();

            if ($order->payment_status === 'paid') {
                // Idempotent: already processed (e.g. duplicate callback).
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('order.success', $order),
                ]);
            }

            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );

            try {
                $api->utility->verifyPaymentSignature([
                    'razorpay_order_id' => $validated['razorpay_order_id'],
                    'razorpay_payment_id' => $validated['razorpay_payment_id'],
                    'razorpay_signature' => $validated['razorpay_signature'],
                ]);
            } catch (SignatureVerificationError $e) {
                Log::warning('Razorpay signature verification failed for order ' . $order->id, [
                    'error' => $e->getMessage(),
                ]);

                DB::transaction(function () use ($order, $validated) {
                    $order->update([
                        'payment_status' => 'failed',
                        'failed_at' => now(),
                        'razorpay_payment_id' => $validated['razorpay_payment_id'],
                    ]);
                });

                return response()->json([
                    'success' => false,
                    'message' => 'Payment signature verification failed.',
                ], 422);
            }

            DB::transaction(function () use ($order, $validated) {
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'confirmed',
                    'razorpay_payment_id' => $validated['razorpay_payment_id'],
                    'razorpay_signature' => $validated['razorpay_signature'],
                    'paid_at' => now(),
                ]);
            });

            return response()->json([
                'success' => true,
                'redirect_url' => route('order.success', $order),
            ]);

        } catch (Throwable $e) {
            Log::error('Payment success handling failed: ' . $e->getMessage(), [
                'exception' => $e,
                'payload' => $validated,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'We could not verify your payment. If the amount was deducted, please contact support.',
                'error' => $e->getMessage(),
                'response' => $request,
            ], 500);
        }
    }

    /**
     * Record a failed / abandoned payment attempt. The order remains
     * pending so the customer can retry payment later.
     */
    public function paymentFailed(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order_id' => ['required', 'integer', 'exists:orders,id'],
            'razorpay_payment_id' => ['nullable', 'string'],
            'reason' => ['nullable', 'string', 'max:500'],
        ]);

        try {
            $order = Order::findOrFail($validated['order_id']);

            if ($order->payment_status !== 'paid') {
                DB::transaction(function () use ($order, $validated) {
                    $order->update([
                        'payment_status' => 'failed',
                        'failed_at' => now(),
                        'razorpay_payment_id' => $validated['razorpay_payment_id'] ?? $order->razorpay_payment_id,
                        'admin_note' => trim(($order->admin_note ? $order->admin_note . "\n" : '') . '[' . now() . '] ' . ($validated['reason'] ?? 'Payment failed.')),
                    ]);
                });
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment failure recorded. You can retry payment for this order.',
            ]);

        } catch (Throwable $e) {
            Log::error('Payment failed handling failed: ' . $e->getMessage(), [
                'exception' => $e,
                'payload' => $validated,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Could not record the payment failure.',
            ], 500);
        }
    }

    /**
     * Show the order success page.
     */
    public function orderSuccess(Order $order): View
    {
        return view('order-success', compact('order'));
    }

    /**
     * Create a Razorpay Order for the given local Order.
     */
    protected function createRazorpayOrder(Order $order): \Razorpay\Api\Order
    {
        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );

        return $api->order->create([
            'receipt' => $order->order_number,
            'amount' => (int) round($order->grand_total * 100),
            'currency' => 'INR',
            'payment_capture' => 1,
            'notes' => [
                'order_id' => (string) $order->id,
                'order_number' => $order->order_number,
                'email' => $order->email,
                'phone' => $order->phone,
            ],
        ]);
    }

    /**
     * Generate a unique, human-readable order number.
     */
    protected function generateOrderNumber(): string
    {
        do {
            $orderNumber = 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }

    /**
     * Shipping calculation. Replace with your real shipping rules.
     */
    protected function calculateShipping(float $subtotal): float
    {
        return 0.00;
    }

    /**
     * Discount calculation. Replace with your coupon / promotion logic.
     */
    protected function calculateDiscount(float $subtotal): float
    {
        return 0.00;
    }

    /**
     * Tax calculation. Replace with your real tax rules (e.g. GST slabs).
     */
    protected function calculateTax(float $subtotal, float $discount): float
    {
        return 0.00;
    }
}

