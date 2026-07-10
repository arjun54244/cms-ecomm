<div class="fix">
   <div class="side-info">
      <div class="side-info-content">
         <div class="offset-widget offset-logo mb-40">
            <div class="row align-items-center">
               <div class="col-9">
                  <a href="index.html">
                     <img src="assets/img/logo/logo-bl.png" alt="Logo">
                  </a>
               </div>
               <div class="col-3 text-end"><button class="side-info-close"><i class="fal fa-times"></i></button>
               </div>
            </div>
         </div>
         <div class="mobile-menu d-lg-none fix"></div>
         <div class="offset-profile-action d-md-none">
            <div class="offset-widget mb-40">
               <div class="action-list action-list-header1">
                  <div class="action-item action-item-cart">
                     <a href="javascript:void(0)" class="view-cart-button">
                        <i class="fal fa-shopping-bag"></i>
                        <span class="action-item-number">3</span></a>
                  </div>
                  <div class="action-item action-item-wishlist">
                     <a href="javascript:void(0)" class="view-wishlist-button">
                        <i class="fal fa-heart"></i>
                        <span class="action-item-number">2</span></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="offset-widget offset_searchbar mb-30">
            <form action="{{ route('shop') }}" method="GET" class="filter-search-input">
               <input type="text" name="search" placeholder="Search keyword" value="{{ request('search') }}">
               <button type="submit"><i class="fal fa-search"></i></button>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="offcanvas-overlay"></div>
<div class="offcanvas-overlay-white"></div>

<div class="fix">
   <div class="sidebar-action sidebar-cart">
      <button class="close-sidebar">Close<i class="fal fa-times"></i></button>
      <h4 class="sidebar-action-title">Shopping Cart</h4>
      <div class="sidebar-action-list" id="sidebarCartItems">

         <div class="empty-cart text-center py-4">
            Your cart is empty.
         </div>

      </div>
      <div class="product-price-total">
         <span>Subtotal :</span>
         <span class="subtotal-price" id="sidebarSubtotal">
            ₹0.00
         </span>
      </div>
      <div class="sidebar-action-btn">
         <a href="{{ route('cart') }}" class="fill-btn">View cart</a>
         <a href="{{ route('checkout') }}" class="border-btn">Checkout</a>
      </div>
   </div>
</div>