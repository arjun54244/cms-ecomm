@extends('layout.app')

@section('title', 'Shop')

@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">Shop</h1>
                        <div class="breadcrumb-menu">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items">
                                    <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                                    <li class="trail-item trail-end"><span>Shop</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->

    <style>
        .category-item.active {
            color: #fff;
            background: #111;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .category-item.active .category-items-number {
            color: #fff;
        }
    </style>

    <!-- shop main area start  -->
    <div class="shop-main-area pt-120 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="sidebar-widget-wrapper mb-110 d-none d-lg-block">
                        <form action="{{ route('shop') }}" method="GET">
                            {{-- Search --}}
                            <div class="filter-widget mb-40">
                                <h4 class="filter-widget-title">Search</h4>
                                <div class="filter-widget-content">
                                    <div class="filter-widget-search">
                                        <input type="text" name="search" value="{{ request('search') }}"
                                            placeholder="Search products...">
                                        <button type="submit">
                                            <i class="fal fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Categories --}}
                            <div class="filter-widget mb-40">
                                <h4 class="filter-widget-title">Categories</h4>
                                <div class="filter-widget-content">
                                    <div class="category-items">
                                        <a href="{{ route('shop') }}"
                                            class="category-item {{ request('category') ? '' : 'active' }}">
                                            <div class="category-name">All Categories</div>
                                        </a>

                                        @foreach($categories as $category)
                                            <a href="{{ route('shop', array_merge(request()->except('page'), ['category' => $category->id])) }}"
                                                class="category-item {{ request('category') == $category->id ? 'active' : '' }}">
                                                <div class="category-name">{{ $category->name }}</div>
                                                <span class="category-items-number">
                                                    {{ $category->products()->active()->count() }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="filter-widget mb-40">
                                <h4 class="filter-widget-title">Price</h4>
                                <div class="filter-widget-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" name="min_price" placeholder="Min"
                                                value="{{ request('min_price') }}">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" name="max_price" placeholder="Max"
                                                value="{{ request('max_price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Sort --}}
                            <style>
                                .nice-select {
                                    font-size: 16px;
                                    color: #171717;
                                    border: none;
                                    width: 100%;
                                    padding-left: 0;
                                    padding-right: 15px;
                                }

                                .form-select {
                                    background: none;
                                }
                            </style>
                            <div class="filter-widget mb-40">
                                <h4 class="filter-widget-title">Sort By</h4>
                                <div class="filter-widget-content">
                                    <select class="form-select" name="sort" onchange="this.form.submit()">

                                        <option value="">Latest</option>

                                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                            Price: Low to High
                                        </option>

                                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                            Price: High to Low
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="fill-btn w-100">Apply Filters</button>

                            @if(request()->hasAny(['search', 'category', 'min_price', 'max_price', 'sort']))
                                <a href="{{ route('shop') }}" class="border-btn w-100 mt-3 text-center">Reset Filters</a>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class="shop-main-wrapper mb-60">
                        <div class="shop-main-wrapper-head mb-30">
                            <div class="swowing-list">
                                Showing
                                <span>
                                    {{ $products->firstItem() ?? 0 }} -
                                    {{ $products->lastItem() ?? 0 }}
                                    of
                                    {{ $products->total() }}
                                </span>
                                Products
                            </div>

                            <div class="sort-type-filter">
                                <div class="sorting-type">
                                    <span>Sort by :</span>
                                    <select class="sorting-list" onchange="window.location=this.value">
                                        <option value="{{ request()->fullUrlWithQuery(['sort' => '']) }}" {{ request('sort') == '' ? 'selected' : '' }}>Latest</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="products-wrapper products-4-column">
                            @forelse($products as $product)
                                <div class="single-product">
                                    <div class="product-image pos-rel">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            <img src="{{ Storage::url($product->featured_image) }}" alt="{{ $product->name }}">
                                        </a>

                                        <div class="product-action">
                                            <a href="#" class="quick-view-btn"><i class="fal fa-eye"></i></a>
                                            <a href="#" class="wishlist-btn"><i class="fal fa-heart"></i></a>
                                            <a href="#" class="compare-btn"><i class="fal fa-exchange"></i></a>
                                        </div>

                                        <div class="product-action-bottom flex-column gap-1">
                                            <a href="#" class="fill-btn add-cart-btn" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                                                data-image="{{ Storage::url($product->featured_image) }}"
                                                data-price="{{ $product->sale_price ?: $product->price }}" data-quantity="1">
                                                <i class="fal fa-shopping-bag"></i>
                                                Add to Cart

                                            </a>
                                            <a href="#" class="border-btn buy-now-btn" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                                                data-image="{{ Storage::url($product->featured_image) }}"
                                                data-price="{{ $product->sale_price ?: $product->price }}" data-quantity="1">

                                                Buy Now

                                            </a>
                                        </div>

                                        @if($product->sale_price)
                                            <div class="product-sticker-wrapper">
                                                <span class="product-sticker discount">Sale</span>
                                            </div>
                                        @else
                                            <div class="product-sticker-wrapper">
                                                <span class="product-sticker new">New</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="product-desc">
                                        <div class="product-name">
                                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                        </div>

                                        <div class="product-price">
                                            @if($product->sale_price)
                                                <span class="price-now">₹{{ number_format($product->sale_price, 2) }}</span>
                                                <span class="price-old">₹{{ number_format($product->price, 2) }}</span>
                                            @else
                                                <span class="price-now">₹{{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>

                                        @if($product->category)
                                            <small class="text-muted">{{ $product->category->name }}</small>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <h4>No products found.</h4>
                                </div>
                            @endforelse
                        </div>

                        <div class="mt-5 d-flex justify-content-center">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop main area end  -->
@endsection