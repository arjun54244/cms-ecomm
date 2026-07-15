<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderItem;

beforeEach(function () {
    // Create site settings needed by AppServiceProvider
    Setting::create([
        'site_name' => 'Jaipur Heritage',
        'email' => 'support@jaipurheritage.com',
        'enable_cod' => true,
    ]);
});

test('a guest customer can successfully place a COD order with product variants', function () {
    $category = Category::create([
        'name' => 'Kurtis',
        'slug' => 'kurtis',
    ]);

    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Premium Silk Kurta',
        'slug' => 'premium-silk-kurta',
        'sku' => 'PSK-001',
        'price' => 1200.00,
        'sale_price' => 999.00, // discounted price
        'stock' => 10,
        'sizes' => ['M', 'L', 'XL'],
        'colors' => ['Red', 'Blue'],
        'is_active' => true,
    ]);

    $payload = [
        'customer_name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '9876543210',
        'address' => '123 Main Street',
        'city' => 'Jaipur',
        'state' => 'Rajasthan',
        'postal_code' => '302001',
        'customer_note' => 'Deliver in afternoon',
        'payment_method' => 'cod',
        'cart' => [
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => 1200.00, // client price, server should override to sale_price (999.00)
                'quantity' => 2,
                'size' => 'M',
                'color' => 'Red',
            ]
        ],
    ];

    $response = $this->postJson(route('checkout.store'), $payload);

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'payment_method' => 'cod',
        ]);

    // Verify order was created in DB
    $order = Order::first();
    expect($order)->not->toBeNull();
    expect($order->customer_name)->toBe('John Doe');
    expect($order->email)->toBe('john@example.com');
    expect($order->grand_total)->toEqual(1998.00); // 999.00 * 2 (using sale_price)

    // Verify order item was created in DB with variants
    $orderItem = OrderItem::first();
    expect($orderItem)->not->toBeNull();
    expect($orderItem->product_id)->toBe($product->id);
    expect($orderItem->selected_size)->toBe('M');
    expect($orderItem->selected_color)->toBe('Red');
    expect($orderItem->price)->toEqual(999.00);
    expect($orderItem->total)->toEqual(1998.00);
});
