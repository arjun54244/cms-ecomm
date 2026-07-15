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
     
    <!-- shop details area new start  -->
     <style>
    #detail-add-cart-btn:hover { background:#333 !important; }
    #detail-buy-now-btn:hover { background:#1a1a1a !important; color:#fff !important; }
    .size-btn:hover { border-color:#1a1a1a !important; }
    .size-btn.active { background:#1a1a1a !important; color:#fff !important; border-color:#1a1a1a !important; }
    .product-color-nav li:hover { border-color:#1a1a1a !important; }
    .nav-link.active { border-color:#1a1a1a !important; }
</style>
     <section class="shop-details-area pt-120 pb-90">
    <div class="container container-small">
        <div class="row g-4">

            {{-- LEFT: IMAGE GALLERY --}}
            <div class="col-lg-6">
                <div class="product-details-tab-wrapper mb-30">

                    <div class="product-details-tab">
                        <div class="tab-content" id="productDetailsTab">

                            {{-- Featured Image --}}
                            <div class="tab-pane fade show active" id="pro-featured" role="tabpanel">
                                <img src="{{ Storage::url($product->featured_image) }}"
                                     alt="{{ $product->name }}"
                                     class="img-fluid rounded-3 shadow-sm w-100"
                                     style="object-fit: cover; aspect-ratio: 1/1; border: 1px solid #eee;">
                            </div>

                            {{-- Gallery Images --}}
                            @foreach($product->images as $image)
                                <div class="tab-pane fade" id="pro-{{ $image->id }}" role="tabpanel">
                                    <img src="{{ Storage::url($image->image) }}"
                                         alt="{{ $product->name }}"
                                         class="img-fluid rounded-3 shadow-sm w-100"
                                         style="object-fit: cover; aspect-ratio: 1/1; border: 1px solid #eee;">
                                </div>
                            @endforeach

                        </div>
                    </div>

                    {{-- Thumbnails --}}
                    <div class="product-details-nav mt-3">
                        <ul class="nav nav-tabs d-flex flex-wrap gap-2 border-0" style="list-style: none; padding-left: 0;">

                            <li class="nav-item">
                                <button class="nav-link active p-1 rounded-2" data-bs-toggle="tab"
                                        data-bs-target="#pro-featured"
                                        style="border: 2px solid #dee2e6; width: 70px; height: 70px; overflow: hidden;">
                                    <img src="{{ Storage::url($product->featured_image) }}"
                                         alt="{{ $product->name }}"
                                         class="w-100 h-100" style="object-fit: cover;">
                                </button>
                            </li>

                            @foreach($product->images as $image)
                                <li class="nav-item">
                                    <button class="nav-link p-1 rounded-2" data-bs-toggle="tab"
                                            data-bs-target="#pro-{{ $image->id }}"
                                            style="border: 2px solid #dee2e6; width: 70px; height: 70px; overflow: hidden;">
                                        <img src="{{ Storage::url($image->image) }}"
                                             alt="{{ $product->name }}"
                                             class="w-100 h-100" style="object-fit: cover;">
                                    </button>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            {{-- RIGHT: PRODUCT INFO --}}
            <div class="col-lg-6">
                <div class="product-side-info mb-30 ps-lg-3">

                    <h4 class="product-name mb-2 fw-bold" style="font-size: 1.75rem; color: #1a1a1a;">
                        {{ $product->name }}
                    </h4>

                    {{-- Price --}}
                    <div class="product-price mb-3 d-flex align-items-center gap-2">
                        @if($product->sale_price)
                            <span class="price-now fw-bold" style="font-size: 1.5rem; color: #d63447;">
                                ₹{{ number_format($product->sale_price, 2) }}
                            </span>
                            <span class="price-old text-muted" style="font-size: 1.1rem; text-decoration: line-through;">
                                ₹{{ number_format($product->price, 2) }}
                            </span>
                            <span class="badge rounded-pill" style="background: #d63447; color: #fff; font-size: 0.8rem;">
                                {{ $product->discount_percentage }}% OFF
                            </span>
                        @else
                            <span class="price-now fw-bold" style="font-size: 1.5rem; color: #1a1a1a;">
                                ₹{{ number_format($product->price, 2) }}
                            </span>
                        @endif
                    </div>

                    <p class="mb-4 text-muted" style="line-height: 1.7;">
                        {{ $product->short_description }}
                    </p>

                    {{-- Meta info card --}}
                    <ul class="list-unstyled mb-4 p-3 rounded-3" style="background: #f8f9fa; border: 1px solid #eee;">
                        <li class="d-flex justify-content-between py-1">
                            <strong>SKU</strong>
                            <span class="text-muted">{{ $product->sku }}</span>
                        </li>
                        <li class="d-flex justify-content-between py-1 border-top mt-1 pt-2">
                            <strong>Category</strong>
                            <span class="text-muted">{{ $product->category->name }}</span>
                        </li>
                        <li class="d-flex justify-content-between py-1 border-top mt-1 pt-2">
                            <strong>Availability</strong>
                            @if($product->stock > 0)
                                <span class="badge rounded-pill" style="background:#e6f6ec; color:#1e7e34; font-weight:500;">
                                    In Stock ({{ $product->stock }})
                                </span>
                            @else
                                <span class="badge rounded-pill" style="background:#fdecea; color:#c0392b; font-weight:500;">
                                    Out of Stock
                                </span>
                            @endif
                        </li>
                    </ul>

                    <div class="product-quantity-cart mb-4">

                        {{-- Size Selector --}}
                        @if(!empty($product->sizes) && count($product->sizes))
                            <div class="variant-selector mb-3" id="size-selector-wrap">
                                <label class="variant-label d-block mb-2">
                                    <strong>Size:</strong>
                                    <span id="selected-size-label" class="text-muted"></span>
                                </label>
                                <div class="size-options d-flex flex-wrap gap-2">
                                    @foreach($product->sizes as $size)
                                        <button type="button" class="size-btn {{ $loop->first ? 'selected' : '' }}" data-size="{{ $size }}">
                                            {{ $size }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Color Selector --}}
                        @if(!empty($product->colors) && count($product->colors))
                            <div class="variant-selector mb-3" id="color-selector-wrap">
                                <label class="variant-label d-block mb-2">
                                    <strong>Color:</strong>
                                    <span id="selected-color-label" class="text-muted"></span>
                                </label>
                                <ul class="product-color-nav d-flex flex-wrap gap-2" style="list-style: none; padding-left: 0; margin: 0;">
                                    @foreach($product->colors as $color)
                                        <li class="color-swatch-btn cl-{{ strtolower($color) }} {{ $loop->first ? 'selected' : '' }}"
                                            data-color="{{ $color }}" title="{{ $color }}">
                                            <img src="{{ $product->featured_image ? Storage::url($product->featured_image) : asset('assets/img/product/default.jpg') }}"
                                                 alt="{{ $color }}"
                                                 class="w-100 h-100" style="object-fit: cover;">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Quantity --}}
                        <div class="product-quantity-form mb-3">
                            <form class="d-inline-flex align-items-center" style="border: 1px solid #ccc; border-radius: 6px; overflow: hidden;">
                                <button type="button" class="cart-minus d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 42px; background: #f8f9fa; border: none; border-right: 1px solid #ccc;">
                                    <i class="far fa-minus"></i>
                                </button>

                                <input class="cart-input text-center" type="text" value="1" id="qty-input"
                                       style="width: 50px; height: 42px; border: none; outline: none;">

                                <button type="button" class="cart-plus d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 42px; background: #f8f9fa; border: none; border-left: 1px solid #ccc;">
                                    <i class="far fa-plus"></i>
                                </button>
                            </form>
                        </div>

                        {{-- Add to Cart --}}
                        <a href="#" class="fill-btn add-cart-btn d-inline-flex align-items-center justify-content-center w-100"
                           id="detail-add-cart-btn"
                           data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                           data-slug="{{ $product->slug }}" data-image="{{ Storage::url($product->featured_image) }}"
                           data-price="{{ $product->sale_price ?: $product->price }}" data-quantity="1"
                           data-has-sizes="{{ (!empty($product->sizes) && count($product->sizes)) ? 'true' : 'false' }}"
                           data-has-colors="{{ (!empty($product->colors) && count($product->colors)) ? 'true' : 'false' }}"
                           style="background:#1a1a1a; color:#fff; padding: 14px 0; border-radius: 6px;
                                  font-weight: 600; text-decoration: none; transition: background 0.15s ease;">
                            <i class="far fa-shopping-cart me-2"></i> Add to Cart
                        </a>
                    </div>

                    {{-- Buy Now --}}
                    <a href="#" class="border-btn buy-now-btn d-inline-flex align-items-center justify-content-center w-100 mb-4"
                       id="detail-buy-now-btn" data-id="{{ $product->id }}"
                       data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                       data-image="{{ Storage::url($product->featured_image) }}"
                       data-price="{{ $product->sale_price ?: $product->price }}" data-quantity="1"
                       data-has-sizes="{{ (!empty($product->sizes) && count($product->sizes)) ? 'true' : 'false' }}"
                       data-has-colors="{{ (!empty($product->colors) && count($product->colors)) ? 'true' : 'false' }}"
                       style="border: 1.5px solid #1a1a1a; color:#1a1a1a; padding: 14px 0; border-radius: 6px;
                              font-weight: 600; text-decoration: none; transition: all 0.15s ease;">
                        Buy Now
                    </a>

                    {{-- Share --}}
                    <div class="product-meta mt-3 pt-3 border-top d-flex align-items-center gap-2">
                        <strong class="me-2">Share:</strong>
                        @foreach(['facebook-f','twitter','linkedin-in','pinterest-p'] as $icon)
                            <a href="#" class="d-inline-flex align-items-center justify-content-center"
                               style="width: 36px; height: 36px; border-radius: 50%; background: #f8f9fa;
                                      color: #333; border: 1px solid #eee; text-decoration: none;">
                                <i class="fab fa-{{ $icon }}"></i>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

    <!-- shop details area new end  -->

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

@push('styles')
    <style>
        /* ── Variant Selectors ── */
        .variant-selector {
            margin-bottom: 16px;
        }

        .variant-label {
            font-size: 14px;
            color: #444;
            display: block;
            margin-bottom: 6px;
        }

        #selected-size-label,
        #selected-color-label {
            font-weight: 600;
            color: #111;
            margin-left: 4px;
        }

        /* Size buttons */
        .size-options {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .size-btn {
            min-width: 46px;
            padding: 6px 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            background: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s ease;
            color: #333;
        }

        .size-btn:hover {
            border-color: #111;
            background: #f5f5f5;
        }

        .size-btn.selected {
            border-color: #111;
            background: #111;
            color: #fff;
        }

        /* Color swatches */
        .color-swatch-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid #ddd;
            cursor: pointer;
            transition: all 0.15s ease;
            outline: none;
            overflow: hidden;
        }

        .color-swatch-btn:hover {
            border-color: #1a1a1a;
            transform: scale(1.05);
        }

        .color-swatch-btn.selected {
            border-color: #1a1a1a;
            transform: scale(1.05);
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px #1a1a1a;
        }
    </style>
@endpush

@push('scripts')
    <script>
        (function () {
            /* ── State ── */
            let selectedSize = null;
            let selectedColor = null;

            const addBtn = document.getElementById('detail-add-cart-btn');
            const buyBtn = document.getElementById('detail-buy-now-btn');
            const qtyInput = document.getElementById('qty-input');

            // Initialize default selected variant state on page load
            const firstSizeBtn = document.querySelector('.size-btn.selected');
            if (firstSizeBtn) {
                selectedSize = firstSizeBtn.dataset.size;
                const sizeLabel = document.getElementById('selected-size-label');
                if (sizeLabel) sizeLabel.textContent = selectedSize;
            }

            const firstColorBtn = document.querySelector('.color-swatch-btn.selected');
            if (firstColorBtn) {
                selectedColor = firstColorBtn.dataset.color;
                const colorLabel = document.getElementById('selected-color-label');
                if (colorLabel) colorLabel.textContent = selectedColor;
            }

            syncVariants();

            /* ── Size Buttons ── */
            document.querySelectorAll('.size-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    selectedSize = btn.dataset.size;
                    const sizeLabel = document.getElementById('selected-size-label');
                    if (sizeLabel) sizeLabel.textContent = selectedSize;
                    syncVariants();
                });
            });

            /* ── Color Swatches ── */
            document.querySelectorAll('.color-swatch-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.color-swatch-btn').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    selectedColor = btn.dataset.color;
                    const colorLabel = document.getElementById('selected-color-label');
                    if (colorLabel) colorLabel.textContent = selectedColor;
                    syncVariants();
                });
            });

            /* ── Quantity Stepper ── */
            document.querySelector('.cart-minus')?.addEventListener('click', () => {
                let v = parseInt(qtyInput?.value || 1);
                if (v > 1) qtyInput.value = v - 1;
                if (addBtn) addBtn.dataset.quantity = qtyInput.value;
                if (buyBtn) buyBtn.dataset.quantity = qtyInput.value;
            });
            document.querySelector('.cart-plus')?.addEventListener('click', () => {
                let v = parseInt(qtyInput?.value || 1);
                qtyInput.value = v + 1;
                if (addBtn) addBtn.dataset.quantity = qtyInput.value;
                if (buyBtn) buyBtn.dataset.quantity = qtyInput.value;
            });

            /* ── Sync selected variants into data-* on buttons ── */
            function syncVariants() {
                [addBtn, buyBtn].forEach(btn => {
                    if (!btn) return;
                    if (selectedSize) btn.dataset.size = selectedSize;
                    if (selectedColor) btn.dataset.color = selectedColor;
                });
            }

            /* ── Validation before Add to Cart / Buy Now ── */
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('#detail-add-cart-btn, #detail-buy-now-btn');
                if (!btn) return;

                const needsSize = btn.dataset.hasSizes === 'true';
                const needsColor = btn.dataset.hasColors === 'true';

                if (needsSize && !selectedSize) {
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    showVariantAlert('Please select a size before continuing.');
                    document.getElementById('size-selector-wrap')?.classList.add('variant-error-shake');
                    setTimeout(() => {
                        document.getElementById('size-selector-wrap')?.classList.remove('variant-error-shake');
                    }, 600);
                    return;
                }

                if (needsColor && !selectedColor) {
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    showVariantAlert('Please select a color before continuing.');
                    document.getElementById('color-selector-wrap')?.classList.add('variant-error-shake');
                    setTimeout(() => {
                        document.getElementById('color-selector-wrap')?.classList.remove('variant-error-shake');
                    }, 600);
                    return;
                }

                /* Inject quantity from stepper */
                if (qtyInput) btn.dataset.quantity = qtyInput.value;
            }, true /* capture phase – fires before cart.js listener */);

            function showVariantAlert(msg) {
                let el = document.getElementById('variant-alert-toast');
                if (!el) {
                    el = document.createElement('div');
                    el.id = 'variant-alert-toast';
                    el.style.cssText = `
                        position:fixed; bottom:30px; left:50%; transform:translateX(-50%);
                        background:#111; color:#fff; padding:12px 24px; border-radius:8px;
                        font-size:14px; z-index:9999; box-shadow:0 4px 16px rgba(0,0,0,.3);
                        transition:opacity .3s;
                    `;
                    document.body.appendChild(el);
                }
                el.textContent = msg;
                el.style.opacity = '1';
                clearTimeout(el._hideTimer);
                el._hideTimer = setTimeout(() => { el.style.opacity = '0'; }, 2800);
            }
        })();
    </script>

    <style>
        @keyframes variant-shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-6px);
            }

            40% {
                transform: translateX(6px);
            }

            60% {
                transform: translateX(-4px);
            }

            80% {
                transform: translateX(4px);
            }
        }

        .variant-error-shake {
            animation: variant-shake .4s ease;
        }
    </style>
@endpush