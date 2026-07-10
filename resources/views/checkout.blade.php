@extends('layout.app')

@section('content')



   <!-- page title area start  -->
   <section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="page-title-wrapper text-center">
                  <h1 class="page-title mb-10">Checkout</h1>
                  <div class="breadcrumb-menu">
                     <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items">
                           <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                           <li class="trail-item trail-end"><span>Checkout</span></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- page title area end  -->

   <!-- checkout-area start -->
   <section class="checkout-area pt-100 pb-70">
      <div class="container container-small">

         <!-- Empty cart notice (hidden by default, shown by checkout.js if cart is empty) -->
         <div id="empty-cart-message" class="row" style="display:none;">
            <div class="col-12 text-center">
               <p>Your cart is empty. Please add some products before checking out.</p>
               <a href="{{ url('/shop') }}" class="fill-btn">Continue Shopping</a>
            </div>
         </div>

         <!-- Global AJAX error box -->
         <div id="checkout-errors" class="row" style="display:none;">
            <div class="col-12">
               <div class="alert alert-danger"
                  style="border:1px solid #dc3545; background:#f8d7da; color:#842029; padding:12px 16px; margin-bottom:20px;">
                  <ul id="checkout-errors-list" style="margin:0; padding-left:18px;"></ul>
               </div>
            </div>
         </div>

         <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="row" id="checkout-form-wrapper">
               <div class="col-lg-6">
                  <div class="checkbox-form">
                     <h3>Billing Details</h3>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="checkout-form-list">
                              <label>Full Name <span class="required">*</span></label>
                              <input type="text" name="customer_name" id="customer_name" placeholder="" />
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="checkout-form-list">
                              <label>Address <span class="required">*</span></label>
                              <input type="text" name="address" id="address" placeholder="Street address" />
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="checkout-form-list">
                              <label>Town / City <span class="required">*</span></label>
                              <input type="text" name="city" id="city" placeholder="Town / City" />
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="checkout-form-list">
                              <label>State / County <span class="required">*</span></label>
                              <input type="text" name="state" id="state" placeholder="" />
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="checkout-form-list">
                              <label>Postcode / Zip <span class="required">*</span></label>
                              <input type="text" name="postal_code" id="postal_code" placeholder="Postcode / Zip" />
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="checkout-form-list">
                              <label>Email Address <span class="required">*</span></label>
                              <input type="email" name="email" id="email" placeholder="" />
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="checkout-form-list">
                              <label>Phone <span class="required">*</span></label>
                              <input type="text" name="phone" id="phone" placeholder="" />
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="checkout-form-list">
                              <label>Order Notes (optional)</label>
                              <textarea name="customer_note" style="width: 100%;" id="customer_note" rows="4"
                                 placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="your-order mb-30 ">
                     <h3>Your order</h3>
                     <div class="your-order-table table-responsive">
                        <table>
                           <thead>
                              <tr>
                                 <th class="product-name">Product</th>
                                 <th class="product-total">Total</th>
                              </tr>
                           </thead>
                           <tbody id="order-items-tbody">
                              <!-- Rendered dynamically by checkout.js from LocalStorage cart -->
                           </tbody>
                           <tfoot>
                              <tr class="cart-subtotal">
                                 <th>Cart Subtotal</th>
                                 <td><span class="amount" id="subtotal-amount">₹0.00</span></td>
                              </tr>
                              <tr class="shipping">
                                 <th>Shipping</th>
                                 <td><span class="amount" id="shipping-amount">₹0.00</span></td>
                              </tr>
                              <tr class="discount-row" id="discount-row" style="display:none;">
                                 <th>Discount</th>
                                 <td><span class="amount" id="discount-amount">- ₹0.00</span></td>
                              </tr>
                              <tr class="tax-row">
                                 <th>Tax</th>
                                 <td><span class="amount" id="tax-amount">₹0.00</span></td>
                              </tr>
                              <tr class="order-total">
                                 <th>Order Total</th>
                                 <td><strong><span class="amount" id="grand-total-amount">₹0.00</span></strong></td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>

                     <!-- Hidden field carrying the full cart JSON to the backend -->
                     <input type="hidden" name="cart" id="cart-data" value="" />

                     <style>
                        .payment-option-card {
                           border: 2px solid #e2e8f0;
                           border-radius: 8px;
                           padding: 18px;
                           margin-bottom: 12px;
                           cursor: pointer;
                           transition: all 0.3s ease;
                           background: #f8fafc;
                        }
                        .payment-option-card:hover {
                           border-color: #cbd5e1;
                           background: #f1f5f9;
                        }
                        .payment-option-card.active {
                           border-color: #171717;
                           background: #ffffff;
                           box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
                        }
                        .payment-option-title {
                           font-size: 16px;
                           font-weight: 700;
                           color: #1e293b;
                           margin-left: 8px;
                        }
                        .payment-option-desc {
                           margin-top: 8px;
                           padding-left: 28px;
                           font-size: 14px;
                           color: #64748b;
                           line-height: 1.5;
                           display: none;
                           transition: all 0.3s ease;
                        }
                        .payment-option-card.active .payment-option-desc {
                           display: block;
                        }
                     </style>

                     <div class="payment-method">
                        <h3 class="mb-20">Payment Method</h3>
                        
                        <div class="payment-selection mb-20">
                           <!-- Razorpay Option -->
                           <div class="payment-option-card active" onclick="selectPaymentOption('razorpay')" id="card_razorpay">
                              <div class="d-flex align-items-center">
                                 <input class="form-check-input" type="radio" name="payment_method" id="payment_razorpay" value="razorpay" checked style="width:18px; height:18px; margin:0; cursor:pointer;">
                                 <label class="payment-option-title text-black" for="payment_razorpay" style="cursor: pointer; margin: 0 0 0 10px; font-weight: bold;">
                                    Pay securely with Razorpay
                                 </label>
                              </div>
                              <div class="payment-option-desc">
                                 You will be redirected to Razorpay's secure checkout to complete your payment using Card, UPI, Netbanking or Wallet. Your order will be confirmed automatically once payment succeeds.
                              </div>
                           </div>

                           <!-- Cash on Delivery Option -->
                           @if(!empty($settings->enable_cod))
                              <div class="payment-option-card" onclick="selectPaymentOption('cod')" id="card_cod">
                                 <div class="d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment_cod" value="cod" style="width:18px; height:18px; margin:0; cursor:pointer;">
                                    <label class="payment-option-title text-black" for="payment_cod" style="cursor: pointer; margin: 0 0 0 10px; font-weight: bold;">
                                       Cash on Delivery (COD)
                                    </label>
                                 </div>
                                 <div class="payment-option-desc">
                                    Pay with cash when your order is delivered to your address.
                                 </div>
                              </div>
                           @endif
                        </div>

                        <div class="order-button-payment mt-20">
                           <button type="submit" class="fill-btn" id="place-order-btn" style="width: 100%;">
                              <span id="place-order-btn-text">Place order</span>
                           </button>
                        </div>
                     </div>

                     <script>
                        function selectPaymentOption(method) {
                           // Check the radio input
                           const radio = document.getElementById('payment_' + method);
                           if (radio) {
                              radio.checked = true;
                           }

                           // Toggle active class on cards
                           document.querySelectorAll('.payment-option-card').forEach(function(card) {
                              card.classList.remove('active');
                           });
                           
                           const activeCard = document.getElementById('card_' + method);
                           if (activeCard) {
                              activeCard.classList.add('active');
                           }
                        }
                     </script>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </section>
   <!-- checkout-area end -->

@endsection

@push('scripts')
   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   <script>
      window.RAZORPAY_KEY = @json(config('services.razorpay.key'));
      window.CHECKOUT_STORE_URL = @json(route('checkout.store'));
      window.PAYMENT_SUCCESS_URL = @json(route('payment.success'));
      window.PAYMENT_FAILED_URL = @json(route('payment.failed'));
      window.ORDER_SUCCESS_BASE_URL = @json(url('/order-success'));
      window.CSRF_TOKEN = @json(csrf_token());
   </script>
   <script src="{{ asset('js/filament/checkout.js') }}"></script>
@endpush