@extends('layout.app')
@section('title', $product->meta_title ?? $product->name)

@section('meta_description', $product->meta_description)

@section('meta_keywords', $product->meta_keywords)

@section('og_image', Storage::url($product->featured_image))
@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/img/bg/page-title-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">Shop</h1>
                        <div class="breadcrumb-menu">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items">
                                    <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                                    <li class="trail-item trail-end"><span>Felted Shirt for Man</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->

    <!-- shop details area start  -->
    <section class="shop-details-area pt-120 pb-90">
        <div class="container container-small">
            <div class="row">
                <div class="col-lg-6">

                    <div class="product-details-tab-wrapper mb-30">

                        <div class="product-details-tab">

                            <div class="tab-content" id="productDetailsTab">

                                {{-- Featured Image --}}
                                <div class="tab-pane fade show active" id="pro-featured" role="tabpanel">

                                    <img src="{{ Storage::url($product->featured_image) }}" alt="{{ $product->name }}">

                                </div>

                                {{-- Gallery Images --}}
                                @foreach($product->images as $image)

                                    <div class="tab-pane fade" id="pro-{{ $image->id }}" role="tabpanel">

                                        <img src="{{ Storage::url($image->image) }}" alt="{{ $product->name }}">

                                    </div>

                                @endforeach

                            </div>

                        </div>

                        <div class="product-details-nav">

                            <ul class="nav nav-tabs">

                                {{-- Featured --}}
                                <li class="nav-item">

                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pro-featured">

                                        <img src="{{ Storage::url($product->featured_image) }}" alt="{{ $product->name }}">

                                    </button>

                                </li>

                                {{-- Gallery --}}
                                @foreach($product->images as $image)

                                    <li class="nav-item">

                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pro-{{ $image->id }}">

                                            <img src="{{ Storage::url($image->image) }}" alt="{{ $product->name }}">

                                        </button>

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="product-side-info mb-30">

                        <h4 class="product-name mb-10">
                            {{ $product->name }}
                        </h4>

                        <div class="product-price mb-20">

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

                        <p class="mb-30">
                            {{ $product->short_description }}
                        </p>

                        <ul class="list-unstyled mb-30">

                            <li>
                                <strong>SKU :</strong>
                                {{ $product->sku }}
                            </li>

                            <li>
                                <strong>Category :</strong>
                                {{ $product->category->name }}
                            </li>

                            <li>
                                <strong>Stock :</strong>

                                @if($product->stock > 0)

                                    <span class="text-success">
                                        In Stock ({{ $product->stock }})
                                    </span>

                                @else

                                    <span class="text-danger">
                                        Out of Stock
                                    </span>

                                @endif

                            </li>

                        </ul>

                        <div class="product-quantity-cart mb-30">

                            <div class="product-quantity-form">

                                <form>

                                    <button type="button" class="cart-minus">
                                        <i class="far fa-minus"></i>
                                    </button>

                                    <input class="cart-input" type="text" value="1">

                                    <button type="button" class="cart-plus">
                                        <i class="far fa-plus"></i>
                                    </button>

                                </form>

                            </div>

                            <a href="#" class="fill-btn add-cart-btn" data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                                data-image="{{ Storage::url($product->featured_image) }}"
                                data-price="{{ $product->sale_price ?: $product->price }}" data-quantity="1">

                                Add to Cart

                            </a>

                        </div>
                        <a href="#" class="border-btn buy-now-btn" data-id="{{ $product->id }}"
                            data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                            data-image="{{ Storage::url($product->featured_image) }}"
                            data-price="{{ $product->sale_price ?: $product->price }}" data-quantity="1">

                            Buy Now

                        </a>

                        <div class="product-meta mt-30">

                            <p>

                                <strong>Share :</strong>

                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>

                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>

                                <a href="#">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>

                            </p>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- shop details area end  -->

    @if($relatedProducts->count())

        <div class="related_product pb-70">
            <div class="container container-small">

                <div class="section-title mb-55">
                    <h2>Related Products</h2>
                </div>

                <div class="row g-4">

                    @foreach($relatedProducts as $related)

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">

                            <div class="single-product">

                                <div class="product-image pos-rel">

                                    <a href="{{ route('product.show', $related->slug) }}">
                                        <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->name }}">
                                    </a>

                                    <div class="product-action">

                                        <a href="{{ route('product.show', $related->slug) }}" class="quick-view-btn">
                                            <i class="fal fa-eye"></i>
                                        </a>

                                        <a href="https://wa.me/?text={{ urlencode($related->name . ' ' . route('product.show', $related->slug)) }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>

                                    </div>

                                    <div class="product-action-bottom">

                                        <a href="#" class="add-cart-btn" data-id="{{ $related->id }}"
                                            data-name="{{ $related->name }}" data-slug="{{ $related->slug }}"
                                            data-image="{{ Storage::url($related->featured_image) }}"
                                            data-price="{{ $related->sale_price ?: $related->price }}" data-quantity="1">

                                            <i class="fal fa-shopping-bag"></i>
                                            Add to Cart

                                        </a>

                                    </div>

                                    <div class="product-sticker-wrapper">

                                        @if($related->sale_price)

                                            <span class="product-sticker sale">

                                                {{ round((($related->price - $related->sale_price) / $related->price) * 100) }}% OFF

                                            </span>

                                        @else

                                            <span class="product-sticker new">
                                                New
                                            </span>

                                        @endif

                                    </div>

                                </div>

                                <div class="product-desc">

                                    <div class="product-name">

                                        <a href="{{ route('product.show', $related->slug) }}">
                                            {{ $related->name }}
                                        </a>

                                    </div>

                                    <div class="product-price">

                                        @if($related->sale_price)

                                            <span class="price-now">
                                                ₹{{ number_format($related->sale_price, 2) }}
                                            </span>

                                            <span class="price-old">
                                                ₹{{ number_format($related->price, 2) }}
                                            </span>

                                        @else

                                            <span class="price-now">
                                                ₹{{ number_format($related->price, 2) }}
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>
        </div>

    @endif

@endsection