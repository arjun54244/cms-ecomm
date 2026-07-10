@extends('layout.app')

@section('title', $page->meta_title ?: $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')

    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/img/bg/page-title-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">{{ $page->title }}</h1>
                        <div class="breadcrumb-menu">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items">
                                    <li class="trail-item trail-begin"><a href="{{ route('home') }}"><span>Home</span></a>
                                    </li>
                                    <li class="trail-item trail-end"><span>{{ $page->title }}</span></li>
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
            <div class="row">
                <div class="col-lg-12">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
    <!-- faq area end -->

@endsection