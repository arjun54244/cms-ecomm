@extends('layout.app')

@section('title', $blog->seo_title ?? $blog->title)

@section('meta_description', $blog->meta_description ?? Str::limit($blog->short_description, 160))

@section('meta_keywords', $blog->meta_keywords ?? 'fashion, clothing, tshirts, hoodies, jeans')

@section('og_title', $blog->seo_title ?? $blog->title)

@section('og_description', $blog->meta_description ?? Str::limit($blog->short_description, 160))

@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="{{ asset('assets/img/bg/page-title-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">{{ $blog->title }}</h1>
                        <div class="breadcrumb-menu">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items">
                                    <li class="trail-item trail-begin"><a href="{{ route('home') }}"><span>Home</span></a>
                                    </li>
                                    <li class="trail-item trail-end"><span>Blog</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->


    <div class="blog-area pt-120 pb-90">
        <div class="container container-small">
            <div class="row">
                <div class="col-xl-8 col-lg-12">

                    <div class="blog-main-wrapper mb-0">

                        <div class="row">

                            <div class="col-12">

                                <div class="blog-wrapper position-relative blog-details-wrapper mb-30">

                                    {{-- Featured Image --}}
                                    <div class="blog-thumb">
                                        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}"
                                            class="img-fluid w-100">
                                    </div>

                                    <div class="blog-content-wrapper">

                                        {{-- Meta --}}
                                        <div class="blog-meta">

                                            <div class="blog-date">
                                                <i class="flaticon-calendar"></i>
                                                <span>{{ $blog->published_at?->format('d M Y') }}</span>
                                            </div>

                                            <div class="blog-user">
                                                <i class="flaticon-avatar"></i>
                                                <span>{{ $settings->site_name ?? config('app.name') }}</span>
                                            </div>

                                        </div>

                                        <div class="blog-content">

                                            <h2 class="mb-25">
                                                {{ $blog->title }}
                                            </h2>

                                            @if($blog->short_description)
                                                <p class="lead mb-30">
                                                    {{ $blog->short_description }}
                                                </p>
                                            @endif

                                            {!! $blog->description !!}

                                            <hr class="mt-40 mb-40">

                                            {{-- Share --}}
                                            <div class="blog__details__tag tagcloud">

                                                <span>Share :</span>

                                                <a target="_blank"
                                                    href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}">
                                                    WhatsApp
                                                </a>

                                                <a target="_blank"
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
                                                    Facebook
                                                </a>

                                                <a target="_blank"
                                                    href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}">
                                                    Twitter
                                                </a>

                                                <a target="_blank"
                                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}">
                                                    LinkedIn
                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Previous / Next Blog --}}
                        <div class="row mt-50">

                            @if($previousBlog)

                                <div class="col-md-6">

                                    <div class="border p-4 h-100">

                                        <small class="text-muted">
                                            Previous Post
                                        </small>

                                        <h5 class="mt-2">

                                            <a href="{{ route('blog.show', $previousBlog->slug) }}">
                                                {{ $previousBlog->title }}
                                            </a>

                                        </h5>

                                    </div>

                                </div>

                            @endif


                            @if($nextBlog)

                                <div class="col-md-6">

                                    <div class="border p-4 h-100 text-md-end">

                                        <small class="text-muted">
                                            Next Post
                                        </small>

                                        <h5 class="mt-2">

                                            <a href="{{ route('blog.show', $nextBlog->slug) }}">
                                                {{ $nextBlog->title }}
                                            </a>

                                        </h5>

                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>
                <div class="col-xl-4 col-lg-8 col-md-8">

                    <div class="sidebar-widget-wrapper">

                        {{-- Search --}}
                        <div class="sidebar__search p-relative mb-30">

                            <form action="{{ route('blog.index') }}" method="GET">

                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search blogs...">

                                <button type="submit">

                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 584.4 584.4">

                                        <g>
                                            <g>
                                                <path class="st0"
                                                    d="M565.7,474.9l-61.1-61.1c-3.8-3.8-8.8-5.9-13.9-5.9c-6.3,0-12.1,3-15.9,8.3c-16.3,22.4-36,42.1-58.4,58.4c-4.8,3.5-7.8,8.8-8.3,14.5c-0.4,5.6,1.7,11.3,5.8,15.4l61.1,61.1c12.1,12.1,28.2,18.8,45.4,18.8c17.1,0,33.3-6.7,45.4-18.8C590.7,540.6,590.7,499.9,565.7,474.9z" />

                                                <path class="st1"
                                                    d="M254.6,509.1c140.4,0,254.5-114.2,254.5-254.5C509.1,114.2,394.9,0,254.6,0C114.2,0,0,114.2,0,254.5C0,394.9,114.2,509.1,254.6,509.1zM254.6,76.4c98.2,0,178.1,79.9,178.1,178.1s-79.9,178.1-178.1,178.1S76.4,352.8,76.4,254.5S156.3,76.4,254.6,76.4z" />
                                            </g>
                                        </g>

                                    </svg>

                                </button>

                            </form>

                        </div>

                        {{-- Recent Posts --}}
                        <div class="sidebar__widget mb-30">

                            <div class="sidebar__widget-head mb-35">
                                <h4 class="sidebar__widget-title">
                                    Recent Posts
                                </h4>
                            </div>

                            <div class="sidebar__widget-content">

                                <div class="rc__post-wrapper">

                                    @foreach($latestBlogs as $item)

                                        <div class="rc__post d-flex align-items-center">

                                            <div class="rc__thumb me-3">

                                                <a href="{{ route('blog.show', $item->slug) }}">

                                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                                                        style="width:80px;height:80px;object-fit:cover;">

                                                </a>

                                            </div>

                                            <div class="rc__content">

                                                <div class="rc__meta">

                                                    <span>

                                                        {{ $item->published_at->format('d M, Y') }}

                                                    </span>

                                                </div>

                                                <h6 class="rc__title">

                                                    <a href="{{ route('blog.show', $item->slug) }}">

                                                        {{ Str::limit($item->title, 45) }}

                                                    </a>

                                                </h6>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                        {{-- Tags --}}
                        <div class="sidebar__widget mb-30">

                            <div class="sidebar__widget-head mb-35">

                                <h4 class="sidebar__widget-title">
                                    Tags
                                </h4>

                            </div>

                            <div class="sidebar__widget-content">

                                <div class="sidebar__tag">

                                    @php
                                        $tags = collect(explode(',', $blog->meta_keywords))
                                            ->map(fn($tag) => trim($tag))
                                            ->filter();
                                    @endphp

                                    @forelse($tags as $tag)

                                        <a href="{{ route('blog.index', ['search' => $tag]) }}">
                                            {{ $tag }}
                                        </a>

                                    @empty

                                        <span class="text-muted">
                                            No tags available
                                        </span>

                                    @endforelse

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection