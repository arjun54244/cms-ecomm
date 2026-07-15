@extends('layout.app')

@section('title', 'faqs')

@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/img/bg/page-title-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">FAQs</h1>
                        <div class="breadcrumb-menu">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items">
                                    <li class="trail-item trail-begin"><a href="{{ route('home') }}"><span>Home</span></a>
                                    </li>
                                    <li class="trail-item trail-end"><span>FAQs</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->

    <!-- FAQ Area Start -->
    <style>
        .accordion-button::after {
            display: none;
        }

        .accordion-button::before {
            content: "\f067";
            font-family: "Font Awesome 5 Pro";
            font-weight: 300;
            margin-right: 15px;
            color: #8B5E3C;
            transition: .3s;
        }

        .accordion-button:not(.collapsed)::before {
            content: "\f068";
        }
    </style>
    <section class="py-5" style="background:linear-gradient(180deg,#fcfaf8 0%,#f8f8f8 100%);">

        <div class="container">

            <!-- Section Heading -->
            <div class="text-center mb-5">

                <span class="badge rounded-pill px-4 py-2 mb-3" style="background:#F5E6DA;color:#8B5E3C;font-size:14px;">
                    Frequently Asked Questions
                </span>

                <h2 class="fw-bold mb-3" style="font-size:2.8rem;color:#2d2d2d;">
                    Everything You Need to Know
                </h2>

                <p class="text-muted mx-auto" style="max-width:700px;font-size:17px;line-height:1.8;">
                    Find answers to the most common questions about shopping,
                    sizing, payments, shipping, returns, and customer support at
                    Jaipur Heritage.
                </p>

            </div>

            @foreach($faqCategories as $row)

                <div class="row g-4 mb-4">

                    @foreach($row as $category => $faqs)

                        <div class="col-lg-6">

                            <div class="rounded-4 shadow-sm bg-white h-100 p-4" style="border:1px solid #eee;">

                                <!-- Category Heading -->

                                <div class="d-flex align-items-center mb-4">

                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width:55px;height:55px;background:#8B5E3C;color:#fff;">

                                        <i class="fal fa-question"></i>

                                    </div>

                                    <div>

                                        <h4 class="fw-bold mb-1">
                                            {{ $category }}
                                        </h4>

                                        <small class="text-muted">
                                            {{ $faqs->count() }} Questions
                                        </small>

                                    </div>

                                </div>

                                <!-- Accordion -->

                                <div class="accordion" id="accordion{{ Str::slug($category) }}">

                                    @foreach($faqs as $faq)

                                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden" style="background:#FAFAFA;">

                                            <h2 class="accordion-header" id="heading{{ $faq->id }}">

                                                <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                    aria-controls="collapse{{ $faq->id }}" style="
                                                                                    background:#FAFAFA;
                                                                                    font-weight:600;
                                                                                    color:#2d2d2d;
                                                                                    padding:18px 20px;
                                                                                    box-shadow:none;
                                                                                ">

                                                    {{ $faq->question }}

                                                </button>

                                            </h2>

                                            <div id="collapse{{ $faq->id }}"
                                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                data-bs-parent="#accordion{{ Str::slug($category) }}">

                                                <div class="accordion-body" style="
                                                                                    background:#fff;
                                                                                    color:#666;
                                                                                    line-height:1.9;
                                                                                    font-size:15px;
                                                                                    border-top:1px solid #eee;
                                                                                ">

                                                    {!! $faq->answer !!}

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endforeach

        </div>

    </section>
    <!-- FAQ Area End -->

@endsection