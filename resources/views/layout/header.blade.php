<style>
   .header-search-wrapper {
      position: relative;
      /* width: 320px; */
   }
   .search-result-list {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
      display: none;
      z-index: 9999;
      max-height: 380px;
      overflow-y: auto;
      padding: 0;
      margin: 8px 0 0 0;
      border: 1px solid #e5e7eb;
   }

   .search-result-list::-webkit-scrollbar {
      width: 6px;
   }

   .search-result-list::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 0 8px 8px 0;
   }

   .search-result-list::-webkit-scrollbar-thumb {
      background: #ccc;
      border-radius: 3px;
   }

   .search-result-list li {
      list-style: none;
      border-bottom: 1px solid #f3f4f6;
   }

   .search-result-list li:last-child {
      border: none;
   }

   .search-result-list li.empty {
      padding: 15px;
      text-align: center;
      color: #6b7280;
      font-size: 14px;
   }

   .search-result-list li a {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 10px 15px;
      text-decoration: none;
      transition: background 0.2s ease;
   }

   .search-result-list li a:hover {
      background: #f9fafb;
   }

   .search-result-list li img {
      width: 48px;
      height: 48px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #f3f4f6;
   }

   .search-result-list li .search-item-info {
      display: flex;
      flex-direction: column;
      gap: 2px;
      overflow: hidden;
   }

   .search-result-list li .search-item-info h6 {
      margin: 0;
      font-size: 13px;
      font-weight: 600;
      color: #1f2937;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
   }

   .search-result-list li .search-item-info .search-item-price {
      font-size: 12px;
      color: #10b981;
      font-weight: 700;
   }

   .search-result-list li .search-item-info .search-item-price del {
      color: #9ca3af;
      font-weight: 400;
      margin-left: 5px;
   }
</style>

<header class="header4">
   <div class="header-note">
      <p>{{ $settings->copyright ?? '' }}</p>
      <span class="note-close-btn"><i class="flaticon-cancel"></i></span>
   </div>

   <div id="header-sticky" class="header-main header-main1">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
               <div class="header-main-content-wrapper">
                  <div class="header-main-left header-main-left-header1">
                     <div class="header-logo header1-logo">
                        <a href="{{ route('home') }}" class="logo-bl"><img src="{{ Storage::url($settings->logo) }}"
                              alt="logo-img"></a>
                     </div>
                     <div class="main-menu main-menu4 d-none d-lg-block">
                        <nav id="mobile-menu">
                           <ul>
                              <li class=""><a href="{{ route('home') }}">Home</a></li>
                              <li class=""><a href="{{ route('about') }}">About</a></li>
                              <li class=""><a href="{{ route('shop') }}">Shop</a></li>
                              <li class="menu-item-has-children"><a href="#">Pages</a>
                                 <ul class="sub-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="error-404.html">404 page</a></li>
                                 </ul>
                              </li>
                              <li class="menu-item-has-children"><a href="blog.html">Blog</a>
                                 <ul class="sub-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                 </ul>
                              </li>
                              <li><a href="{{ route('contact') }}">Contact</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="header-main-right header-main-right-header1">
                     <div class="header-search-wrapper d-none d-xl-inline-block">
                        <form id="headerSearchForm" action="{{ route('shop') }}" method="GET"
                           class="filter-search-input header-search">
                           <input type="text" id="headerSearch" name="search" placeholder="Search Products..."
                              autocomplete="off" value="{{ request('search') }}">
                           <button type="submit">
                              <i class="fal fa-search"></i>
                           </button>
                        </form>
                        <ul id="searchResultList" class="search-result-list"></ul>
                     </div>
                     <div class="action-list d-none d-md-flex action-list-header4">
                        <div class="action-item action-item-cart">
                           <a href="#" class="view-cart-button">
                              <i class="fal fa-shopping-bag"></i>
                              <span class="action-item-numbe cart-count">0</span></a>
                        </div>
                     </div>
                     <div class="menu-bar d-xl-none ml-20">
                        <a class="side-toggle" href="javascript:void(0)">
                           <div class="bar-icon">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>