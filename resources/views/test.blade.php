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

                        <div class="nav nav-tabs" role="tablist">

                            @foreach($featuredCategories as $category)

                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                    data-bs-target="#tab{{ $category->id }}" type="button">

                                    {{ $category->name }}

                                    <span class="total-product">
                                        [{{ $category->products->count() }}]
                                    </span>

                                </button>

                            @endforeach

                        </div>

                    </nav>

                </div>

                {{-- Products --}}
                <div class="tab-content">

                    @foreach($featuredCategories as $category)

                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab{{ $category->id }}">

                            <div class="row">

                                @foreach($category->products as $product)

                                    <div class="col-xl-3 col-lg-4 col-md-6">

                                        <div class="single-product">

                                            <div class="product-image">

                                                <a href="{{ route('product.show', $product->slug) }}">

                                                    <img src="{{ Storage::url($product->featured_image) }}"
                                                        alt="{{ $product->name }}">

                                                </a>

                                                <div class="product-action-bottom">

                                                    <a href="#" class="add-cart-btn">

                                                        <i class="fal fa-shopping-bag"></i>

                                                        Add to Cart

                                                    </a>

                                                </div>

                                                @if($product->is_new)

                                                    <div class="product-sticker-wrapper">

                                                        <span class="product-sticker new">
                                                            New
                                                        </span>

                                                    </div>

                                                @endif

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

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="text-center mt-5">

                <a href="{{ route('shop') }}" class="border-btn">

                    View All Products

                </a>

            </div>

        </div>

    </section>