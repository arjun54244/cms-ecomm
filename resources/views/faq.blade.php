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

    <!-- faq area start -->
    <section class="faq-area pt-120 pb-40 bg-grey fix">
        <div class="container container-small">

            @foreach($faqCategories as $row)

                <div class="row mb-50">

                    @foreach($row as $category => $faqs)

                        <div class="col-lg-6">

                            <div class="faq-wrapper mb-30">

                                <h3 class="mb-30">
                                    {{ $category }}
                                </h3>

                                <div class="choose-right">

                                    <div class="accordion" id="accordion{{ Str::slug($category) }}">

                                        @foreach($faqs as $faq)

                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="heading{{ $faq->id }}">

                                                    <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}"
                                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                        aria-controls="collapse{{ $faq->id }}">

                                                        {{ $faq->question }}

                                                    </button>

                                                </h2>

                                                <div id="collapse{{ $faq->id }}"
                                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $faq->id }}"
                                                    data-bs-parent="#accordion{{ Str::slug($category) }}">

                                                    <div class="accordion-body">

                                                        {!! $faq->answer !!}

                                                    </div>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endforeach

        </div>
    </section>
    <!-- faq area end -->

@endsection