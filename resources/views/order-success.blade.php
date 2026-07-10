@extends('layout.app')

@section('content')

   <!-- order-success-area start -->
   <section class="order-success-area pt-100 pb-100">
      <div class="container container-small">
         <div class="row">
            <div class="col-12 text-center mb-40">
               @if ($order->payment_status === 'paid')
                  <h2>Thank you, {{ $order->customer_name }}!</h2>
                  <p>Your order has been placed successfully.</p>
               @elseif ($order->payment_method === 'cod')
                  <h2>Thank you, {{ $order->customer_name }}!</h2>
                  <p>Your Cash on Delivery order has been placed successfully and is now confirmed.</p>
               @else
                  <h2>Order Received</h2>
                  <p>Your order has been created, but payment has not been completed yet.</p>
               @endif
            </div>
         </div>

         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="your-order mb-30">
                  <h3>Order Details</h3>
                  <div class="your-order-table table-responsive">
                     <table class="table">
                        <tbody>
                           <tr>
                              <th>Order Number</th>
                              <td>{{ $order->order_number }}</td>
                           </tr>
                           <tr>
                              <th>Customer Name</th>
                              <td>{{ $order->customer_name }}</td>
                           </tr>
                           <tr>
                              <th>Email</th>
                              <td>{{ $order->email }}</td>
                           </tr>
                           <tr>
                              <th>Phone</th>
                              <td>{{ $order->phone }}</td>
                           </tr>
                           <tr>
                              <th>Payment Method</th>
                              <td>{{ $order->payment_method === 'cod' ? 'Cash on Delivery (COD)' : 'Razorpay' }}</td>
                           </tr>
                           <tr>
                              <th>{{ $order->payment_status === 'paid' ? 'Amount Paid' : 'Amount to Pay' }}</th>
                              <td>₹{{ number_format($order->grand_total, 2) }}</td>
                           </tr>
                           <tr>
                              <th>Payment Status</th>
                              <td>
                                 <span class="badge" style="padding:6px 12px; border-radius:4px; background:{{ $order->payment_status === 'paid' ? '#d1e7dd' : '#f8d7da' }}; color:{{ $order->payment_status === 'paid' ? '#0f5132' : '#842029' }};">
                                    {{ ucfirst($order->payment_status) }}
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <th>Order Status</th>
                              <td>
                                 <span class="badge" style="padding:6px 12px; border-radius:4px; background:#e2e3e5; color:#41464b;">
                                    {{ ucfirst($order->status) }}
                                 </span>
                              </td>
                           </tr>
                           @if ($order->paid_at)
                              <tr>
                                 <th>Paid At</th>
                                 <td>{{ $order->paid_at->format('d M Y, h:i A') }}</td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>

                  <div class="your-order-table table-responsive mt-30">
                     <table>
                        <thead>
                           <tr>
                              <th class="product-name">Product</th>
                              <th class="product-total">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($order->items as $item)
                              <tr class="cart_item">
                                 <td class="product-name">
                                    {{ $item->product_name }} <strong class="product-quantity"> × {{ $item->quantity }}</strong>
                                 </td>
                                 <td class="product-total">
                                    <span class="amount">₹{{ number_format($item->total, 2) }}</span>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr class="cart-subtotal">
                              <th>Subtotal</th>
                              <td><span class="amount">₹{{ number_format($order->subtotal, 2) }}</span></td>
                           </tr>
                           <tr class="shipping">
                              <th>Shipping</th>
                              <td><span class="amount">₹{{ number_format($order->shipping_charge, 2) }}</span></td>
                           </tr>
                           @if ($order->discount > 0)
                              <tr class="discount">
                                 <th>Discount</th>
                                 <td><span class="amount">- ₹{{ number_format($order->discount, 2) }}</span></td>
                              </tr>
                           @endif
                           <tr class="tax">
                              <th>Tax</th>
                              <td><span class="amount">₹{{ number_format($order->tax, 2) }}</span></td>
                           </tr>
                           <tr class="order-total">
                              <th>Grand Total</th>
                              <td><strong><span class="amount">₹{{ number_format($order->grand_total, 2) }}</span></strong></td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>

                  <div class="text-center mt-40">
                     <a href="{{ url('/shop') }}" class="fill-btn">Continue Shopping</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- order-success-area end -->

@endsection