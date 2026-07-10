@extends('layout.app')

@section('content')

   <!-- Page Title -->
   <section class="page-title-area" data-background="{{ asset('assets/img/bg/page-title-bg.jpg') }}">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="page-title-wrapper text-center">
                  <h1 class="page-title mb-10">Shopping Cart</h1>

                  <div class="breadcrumb-menu">
                     <nav>
                        <ul class="trail-items">
                           <li class="trail-item">
                              <a href="{{ url('/') }}">Home</a>
                           </li>
                           <li class="trail-item">
                              Cart
                           </li>
                        </ul>
                     </nav>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="cart-area pt-100 pb-100">

      <div class="container container-small">

         <div class="row">

            <div class="col-12">

               <div class="table-content table-responsive">

                  <table class="table">

                     <thead>

                        <tr>

                           <th width="120">Image</th>

                           <th>Product</th>

                           <th width="150">Price</th>

                           <th width="180">Quantity</th>

                           <th width="150">Subtotal</th>

                           <th width="80">Remove</th>

                        </tr>

                     </thead>

                     <tbody id="cart-items">

                        {{-- Rendered by JavaScript --}}

                     </tbody>

                  </table>

               </div>

               <div id="empty-cart" class="text-center py-5" style="display:none;">

                  <h3>Your cart is empty.</h3>

                  <p class="mb-4">
                     Looks like you haven't added any products yet.
                  </p>

                  <a href="{{ route('shop') }}" class="fill-btn">
                     Continue Shopping
                  </a>

               </div>

            </div>

         </div>

         <div class="row mt-40">

            <div class="col-md-6">

               <div class="coupon-all">

                  <div class="coupon d-flex">

                     <input type="text" class="input-text" placeholder="Coupon code">

                     <button class="fill-btn" type="button">

                        Apply Coupon

                     </button>

                  </div>

               </div>

            </div>

            <div class="col-md-6">

               <div class="cart-page-total">

                  <h2>Cart Totals</h2>

                  <ul>

                     <li>

                        Subtotal

                        <span id="cart-subtotal">
                           ₹0.00
                        </span>

                     </li>

                     <li>

                        Total

                        <span id="cart-total">
                           ₹0.00
                        </span>

                     </li>

                  </ul>

                  <a href="{{ route('checkout') }}" class="fill-btn w-100 mt-20">

                     Proceed to Checkout

                  </a>

                  <button id="clear-cart" class="border-btn w-100 mt-15">

                     Clear Cart

                  </button>

               </div>

            </div>

         </div>

      </div>

   </section>

@endsection

@push('scripts')
   <script src="{{ asset('assets/js/cart-page.js') }}"></script>
@endpush