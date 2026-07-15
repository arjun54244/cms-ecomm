<!doctype html>
<html class="no-js" lang="zxx">

@php
    $defaultKeywords = is_array($settings->meta_keywords)
        ? implode(', ', $settings->meta_keywords)
        : ($settings->meta_keywords ?? '');
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', $settings->meta_title)</title>
    <meta name="description" content="@yield('meta_description', $settings->meta_description)">
    <meta name="keywords" content="@yield('meta_keywords', $defaultKeywords)">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', $settings->meta_title)">
    <meta property="og:description" content="@yield('og_description', $settings->meta_description)">
    <meta property="og:image" content="@yield('og_image', Storage::url($settings->logo))">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', $settings->meta_title)">
    <meta name="twitter:description" content="@yield('twitter_description', $settings->meta_description)">
    <meta name="twitter:image" content="@yield('twitter_image', Storage::url($settings->logo))">

    <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url($settings->favicon) }}">

    <!-- CSS here -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/preloader.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/backToTop.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/ui-range-slider.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontAwesome5Pro.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css"
        integrity="sha512-AcGTxR95Z7Jw43MLwIuXxeAd7uleS+uMzQ3H6p2pwfwb+SgNEHOtMHB1QUCwT9idefqci5MG/+TP3dnDFObEGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>

<body>


    <!-- header area start  -->
    @include('layout.header')

    <!-- header area end -->

    <!-- Add your site or application content here -->
    <main>


        <!-- side toggle start -->
        @include('layout.sidebar')
        <!-- side toggle end -->

        @yield('content')



    </main>

    <!-- footer area start  -->
    @include('layout.footer')

    <!-- footer area end  -->

    <!-- back to top start -->
    @if(!empty($settings->phone) || !empty($settings->whatsapp))
        <style>
            .sticky-contact {
                position: fixed;
                right: 30px;
                bottom: 10%;
                transform: translateY(-50%);
                z-index: 9999;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .sticky-btn {
                width: 58px;
                height: 58px;
                border-radius: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                text-decoration: none;
                font-size: 22px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, .18);
                transition: .35s;
                position: relative;
                overflow: hidden;
            }

            .sticky-btn span {
                position: absolute;
                right: 70px;
                background: #222;
                color: #fff;
                padding: 8px 14px;
                border-radius: 30px;
                white-space: nowrap;
                opacity: 0;
                visibility: hidden;
                transition: .35s;
                font-size: 14px;
                font-weight: 600;
            }

            .sticky-btn:hover span {
                opacity: 1;
                visibility: visible;
            }

            .phone-btn {
                background: #0d6efd;
            }

            .phone-btn:hover {
                background: #0b5ed7;
                transform: translateX(-5px);
            }

            .whatsapp-btn {
                background: #25D366;
            }

            .whatsapp-btn:hover {
                background: #1ebe5d;
                transform: translateX(-5px);
            }

            @media(max-width:768px) {
                .sticky-contact {
                    right: 15px;
                    bottom: 20px;
                    top: auto;
                    transform: none;
                }

                .sticky-btn {
                    width: 52px;
                    height: 52px;
                    font-size: 20px;
                }

                .sticky-btn span {
                    display: none;
                }
            }
        </style>
        <div class="sticky-contact">

            @if($settings->phone)

                <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}" class="sticky-btn phone-btn" title="Call Now">

                    <i class="fas fa-phone-alt"></i>

                    <span>Call</span>

                </a>

            @endif


            @if($settings->whatsapp)

                @php
                    $whatsapp = preg_replace('/[^0-9]/', '', $settings->whatsapp);
                @endphp

                <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="sticky-btn whatsapp-btn"
                    title="Chat on WhatsApp">

                    <i class="fab fa-whatsapp"></i>

                    <span>WhatsApp</span>

                </a>

            @endif

        </div>

    @endif
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const input = document.getElementById("headerSearch");
            const result = document.getElementById("searchResultList");
            let debounceTimer;

            if (!input || !result) return;

            function performSearch() {
                let keyword = input.value.trim();

                if (keyword.length < 2) {
                    result.innerHTML = "";
                    result.style.display = "none";
                    return;
                }

                fetch("/search-products?keyword=" + encodeURIComponent(keyword))
                    .then(res => res.json())
                    .then(products => {
                        let html = '';
                        if (products.length === 0) {
                            html = '<li class="empty">No Products Found</li>';
                        } else {
                            products.forEach(product => {
                                let priceHtml = '';
                                if (product.sale_price && parseFloat(product.sale_price) < parseFloat(product.price)) {
                                    priceHtml = `₹${parseFloat(product.sale_price).toFixed(2)} <del>₹${parseFloat(product.price).toFixed(2)}</del>`;
                                } else {
                                    priceHtml = `₹${parseFloat(product.price).toFixed(2)}`;
                                }

                                const imageUrl = product.featured_image ? `/storage/${product.featured_image}` : '/assets/img/product/placeholder.jpg';

                                html += `
                                    <li>
                                        <a href="/product/${product.slug}">
                                            <img src="${imageUrl}" alt="${product.name}">
                                            <div class="search-item-info">
                                                <h6>${product.name}</h6>
                                                <span class="search-item-price">${priceHtml}</span>
                                            </div>
                                        </a>
                                    </li>
                                `;
                            });
                        }
                        result.innerHTML = html;
                        result.style.display = "block";
                    })
                    .catch(err => {
                        console.error("Search error:", err);
                    });
            }

            input.addEventListener("input", function () {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(performSearch, 200);
            });

            input.addEventListener("focus", function () {
                if (input.value.trim().length >= 2) {
                    result.style.display = "block";
                }
            });

            document.addEventListener("click", function (e) {
                if (!input.contains(e.target) && !result.contains(e.target)) {
                    result.style.display = "none";
                }
            });
        });
    </script>

    <!-- JS here -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/cart-page.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/meanmenu.js')}}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/parallax.min.js')}}"></script>
    <script src="{{ asset('assets/js/backToTop.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-ui-slider-range.js')}}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js')}}"></script>
    <script src="{{ asset('assets/js/counterup.min.js')}}"></script>
    <script src="{{ asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v4513226cdae34746b4dedf0b4dfa099e1781791509496"
        integrity="sha512-ZE9pZaUXND66v380QUtch/5sE9tPFh2zg45pR2PB0CVkCtOREv2AJKkSidISWkysEuQ0EH8faUU5du78bx87UQ=="
        data-cf-beacon='{"version":"2024.11.0","token":"a4f4a821aa7b43969ba3e85d106ac67f","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script>
    @stack('scripts')
</body>


</html>