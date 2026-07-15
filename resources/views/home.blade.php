@extends('layout.app')
@section('title', 'Buy Premium Clothing Online | Ecomart')

@section('meta_description', 'Shop premium men, women and kids clothing with fast delivery and secure checkout.')

@section('meta_keywords', 'fashion, clothing, tshirts, hoodies, jeans')

@section('og_title', 'Buy Premium Clothing Online | Ecomart')

@section('og_description', 'Discover the latest fashion collection.')

@section('content')
    <style>
        .banner-full {
            width: 100%;
            height: auto;
        }

        .banner-full .banner-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>

    <!-- banner area start  -->
    <div class="banner-area banner-area3">
        <div class="swiper-container slider__active">
            <div class="swiper-wrapper">

                @foreach($settings->banners as $banner)
                    <div class="swiper-slide">
                        <div class="single-banner banner-full">
                            <img src="{{ Storage::url($banner) }}" alt="{{ $settings->site_name }}" class="banner-image">
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Navigation -->
            <div class="slider-nav d-none">
                <div class="slider-button-prev">
                    <i class="fal fa-long-arrow-left"></i>
                </div>
                <div class="slider-button-next">
                    <i class="fal fa-long-arrow-right"></i>
                </div>
            </div>

            <!-- Pagination -->
            <div class="slider2-pagination-container">
                <div class="container">
                    <div class="slider-pagination slider2-pagination"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- banner area end  -->

    <!-- product area start  -->
    <section class="product-area pt-120 pb-120">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section-title text-center">
                        <h2 class="section-main-title mb-35">
                            Featured Collections
                        </h2>
                    </div>
                </div>
            </div>

            <div class="product-tab-wrapper">

                {{-- Tabs --}}
                <div class="product-tab-nav mb-60">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            @foreach($featuredCategories as $category)

                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="nav-{{ $category->id }}-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-{{ $category->id }}" type="button" role="tab"
                                    aria-controls="nav-{{ $category->id }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">

                                    {{ $category->name }}

                                    <span class="total-product">
                                        [{{ $category->products->count() }}]
                                    </span>

                                </button>

                            @endforeach

                        </div>
                    </nav>
                </div>

                {{-- Tab Content --}}
                <div class="product-tab-content">

                    <div class="tab-content" id="nav-tabContent">

                        @foreach($featuredCategories as $category)

                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $category->id }}"
                                role="tabpanel" aria-labelledby="nav-{{ $category->id }}-tab">

                                <div class="products-wrapper">

                                    @forelse($category->products as $product)

                                        <div class="single-product">

                                            <div class="product-image pos-rel">

                                                <a href="{{ route('product.show', $product->slug) }}">
                                                    <img src="{{ Storage::url($product->featured_image) }}"
                                                        alt="{{ $product->name }}">
                                                </a>

                                                <div class="product-action">
                                                    <a href="{{ route('product.show', $product->slug) }}" class="quick-view-btn">
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                </div>

                                                <div class="product-action-bottom flex-column gap-1">
                                                    <a href="#" class="fill-btn add-cart-btn" data-id="{{ $product->id }}"
                                                        data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                                                        data-image="{{ Storage::url($product->featured_image) }}"
                                                        data-price="{{ $product->sale_price ?: $product->price }}"
                                                        data-quantity="1">
                                                        <i class="fal fa-shopping-bag"></i>
                                                        Add to Cart

                                                    </a>
                                                    <a href="#" class="border-btn buy-now-btn" data-id="{{ $product->id }}"
                                                        data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                                                        data-image="{{ Storage::url($product->featured_image) }}"
                                                        data-price="{{ $product->sale_price ?: $product->price }}"
                                                        data-quantity="1">

                                                        Buy Now

                                                    </a>
                                                </div>

                                                <div class="product-sticker-wrapper">
                                                    <span class="product-sticker new">
                                                        New
                                                    </span>
                                                </div>

                                            </div>

                                            <div class="product-desc">

                                                <div class="product-name">
                                                    <a href="{{ route('product.show', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>

                                                <div class="product-price">

                                                    @if($product->sale_price)

                                                        <span class="price-now">
                                                            ₹{{ number_format($product->sale_price, 2) }}
                                                        </span>

                                                        <span class="price-old">
                                                            ₹{{ number_format($product->price, 2) }}
                                                        </span>

                                                    @else

                                                        <span class="price-now">
                                                            ₹{{ number_format($product->price, 2) }}
                                                        </span>

                                                    @endif

                                                </div>

                                               @if(!empty($product->colors) && count($product->colors))
                                                <ul class="product-color-nav">

                                                    @foreach($product->colors as $color)
                                                        <li class="cl-{{strtolower($color)}} {{ $loop->first ? 'active' : '' }}"
                                                            data-color="{{ $color }}"
                                                            title="{{ $color }}">

                                                            <img src="{{ $product->featured_image ? Storage::url($product->featured_image) : asset('assets/img/product/default.jpg') }}"
                                                                alt="{{ $color }}">

                                                        </li>
                                                    @endforeach

                                                </ul>
                                            @endif

                                            </div>

                                        </div>

                                    @empty

                                        <div class="col-12 text-center">
                                            <p>No products found.</p>
                                        </div>

                                    @endforelse

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="product-area-btn mt-10 text-center">
                        <a href="{{ route('shop') }}" class="border-btn">
                            View All Products
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- product area end  -->




    <!-- category area3 start  -->
    <div class="category-area3 pb-0">
        <div class="container">
            <div class="product-category3-wrapper">
                <div class="row">
                    <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6 order-xxl-1">
                        <div class="product-category2-single pos-rel mb-30">
                            <div class="product-category-img">
                                <a href="shop.html"><img src="assets/img/product_category/product-cat-10.jpg"
                                        alt="product-img"></a>
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6 order-xxl-3">
                        <div class="product-category2-single pos-rel mb-30">
                            <div class="product-category-img">
                                <a href="shop.html"><img src="assets/img/product_category/product-cat-15.jpg"
                                        alt="product-img"></a>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-12 order-xxl-2">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="product-category2-single pos-rel mb-30">
                                    <div class="product-category-img">
                                        <a href="shop.html"><img src="assets/img/product_category/product-cat-11.jpg"
                                                alt="product-img"></a>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="product-category2-single pos-rel mb-30">
                                    <div class="product-category-img">
                                        <a href="shop.html"><img src="assets/img/product_category/product-cat-12.jpg"
                                                alt="product-img"></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="product-category2-single pos-rel mb-30">
                                    <div class="product-category-img">
                                        <a href="shop.html"><img src="assets/img/product_category/product-cat-13.jpg"
                                                alt="product-img"></a>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="product-category2-single pos-rel mb-30">
                                    <div class="product-category-img">
                                        <a href="shop.html"><img src="assets/img/product_category/product-cat-14.jpg"
                                                alt="product-img"></a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- category area3 end  -->


    <!-- testimonial area start -->
    @if($testimonials->count())
        <section class="py-5" style="background:#f8f9fa;">
            <div class="container">

                <div class="text-center mb-5">
                    <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#F5E6DA;color:#8B5E3C;font-size:14px;">
                        Customer Reviews
                    </span>

                    <h2 class="fw-bold mb-3" style="font-size:2.8rem;">
                        Loved by Women Across India
                    </h2>

                    <p class="text-muted mx-auto" style="max-width:650px;font-size:17px;">
                        See what our happy customers say about the quality,
                        comfort, and elegance of Jaipur Heritage collections.
                    </p>

                    <div class="d-inline-flex align-items-center mt-3 px-4 py-2 rounded-pill bg-white shadow-sm">

                        <img src="https://www.gstatic.com/images/branding/product/2x/googleg_48dp.png" width="24" class="me-2">

                        <strong class="me-2">Google Reviews</strong>

                        <span class="text-warning">

                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                        </span>

                        <span class="ms-2 fw-bold">
                            4.9/5
                        </span>

                    </div>

                </div>


                <div class="swiper testimonial-active overflow-hidden">

                    <div class="swiper-wrapper">

                        @foreach($testimonials as $testimonial)

                            <div class="swiper-slide">

                                <div class="card border-0 rounded-4 shadow-sm h-100" style="padding:30px;">

                                    <!-- Header -->

                                    <div class="d-flex align-items-center mb-4">

                                        @if($testimonial->image)

                                            <img src="{{ Storage::url($testimonial->image) }}" class="rounded-circle shadow" width="65"
                                                height="65" style="object-fit:cover;">

                                        @else

                                            <img src="{{ asset('assets/img/testimonial/default-author.jpg') }}"
                                                class="rounded-circle shadow" width="65" height="65">

                                        @endif

                                        <div class="ms-3">

                                            <h5 class="mb-1 fw-bold">
                                                {{ $testimonial->name }}
                                            </h5>

                                            <small class="text-success">
                                                <i class="fas fa-check-circle"></i>
                                                Verified Customer
                                            </small>

                                        </div>

                                    </div>

                                    <!-- Stars -->

                                    <div class="mb-3 text-warning">

                                        @for($i = 1; $i <= 5; $i++)

                                            @if($i <= $testimonial->rating)

                                                <i class="fas fa-star"></i>

                                            @else

                                                <i class="far fa-star"></i>

                                            @endif

                                        @endfor

                                    </div>

                                    <!-- Review -->

                                    <p class="text-muted mb-4" style="line-height:1.9;">

                                        "{{ $testimonial->review }}"

                                    </p>

                                    <!-- Footer -->

                                    <div class="mt-auto d-flex justify-content-between align-items-center">

                                        <small class="text-muted">

                                            {{ $testimonial->designation }}

                                            @if($testimonial->company)

                                                • {{ $testimonial->company }}

                                            @endif

                                        </small>

                                        <img src="https://www.gstatic.com/images/branding/product/2x/googleg_48dp.png" width="20">

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                    <div class="testimonial-pagination mt-5 text-center"></div>

                </div>

            </div>
        </section>
    @endif
    <!-- testimonial area end -->

    <!-- newsletter area start  -->
    <section class="newsletter-area pt-0 pb-120">
        <div class="container">
            <div class="newsletter-wrapper" data-background="assets/img/bg/newsletter-bg.png">
                <div class="newsletter-inner">
                    <div class="newsletter-content">
                        <div class="section-title text-center">
                            <h2 class="section-main-title mb-30">Subscribe Newsletter</h2>
                        </div>
                        <p class="mb-40">Enter your email below to be the first to know about new collections and product
                            launches.</p>
                        <form action="#" class="subscribe-form subscribe-form-newsletter">
                            <input type="text" placeholder="Enter your email">
                            <button type="submit">Subscribe<i class="fas fa-long-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter area end  -->




@endsection