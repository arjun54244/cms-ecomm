@extends('layout.app')

@section('title', 'Blogs | Ecomart')

@section('meta_description', 'Shop premium men, women and kids clothing with fast delivery and secure checkout.')

@section('meta_keywords', 'fashion, clothing, tshirts, hoodies, jeans')

@section('og_title', 'Blogs | Ecomart')

@section('og_description', 'Discover the latest fashion collection.')

@section('content')
    <!-- page title area start  -->
    <section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">Blogs</h1>
                        <div class="breadcrumb-menu">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items">
                                    <li class="trail-item trail-begin"><a href="{{ route('home') }}"><span>Home</span></a></li>
                                    <li class="trail-item trail-end"><span>Blogs</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->

    <!-- blog area start  -->

    <!-- blog area start  -->
    <div class="blog-area pt-120 pb-90">
        <div class="container container-small">
            <div class="row">

                <div class="col-xl-8 col-lg-12">

                    <div class="blog-main-wrapper mb-30">

                        @forelse($blogs as $blog)

                            <div class="blog-wrapper position-relative mb-30">

                                <div class="blog-thumb">

                                    <a href="{{ route('blog.show', $blog->slug) }}">

                                        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">

                                    </a>

                                </div>

                                <div class="blog-content-wrapper">

                                    <div class="blog-meta">

                                        <div class="blog-date">

                                            <i class="flaticon-calendar"></i>

                                            <span>{{ $blog->published_at?->format('d M Y') }}</span>

                                        </div>

                                        <div class="blog-user">

                                            <i class="flaticon-avatar"></i>

                                            <span>{{ config('app.name') }}</span>

                                        </div>

                                    </div>

                                    <div class="blog-content">

                                        <a href="{{ route('blog.show', $blog->slug) }}">

                                            <h3>

                                                {{ $blog->title }}

                                            </h3>

                                        </a>

                                        <p>

                                            {{ $blog->short_description }}

                                        </p>

                                        <a class="blog-btn" href="{{ route('blog.show', $blog->slug) }}">

                                            Read More

                                        </a>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="alert alert-info text-center">

                                <h5 class="mb-2">

                                    No Blogs Found

                                </h5>

                                <p class="mb-0">

                                    There are no published blogs yet.

                                </p>

                            </div>

                        @endforelse

                        @if ($blogs->hasPages())
                            <div class="common-pagination mt-40 text-center">
                                {{ $blogs->links() }}
                            </div>
                        @endif

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

                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 584.4 584.4"
                                        style="enable-background:new 0 0 584.4 584.4;" xml:space="preserve">

                                        <g>
                                            <g>
                                                <path class="st0"
                                                    d="M565.7,474.9l-61.1-61.1c-3.8-3.8-8.8-5.9-13.9-5.9c-6.3,0-12.1,3-15.9,8.3c-16.3,22.4-36,42.1-58.4,58.4c-4.8,3.5-7.8,8.8-8.3,14.5c-0.4,5.6,1.7,11.3,5.8,15.4l61.1,61.1c12.1,12.1,28.2,18.8,45.4,18.8c17.1,0,33.3-6.7,45.4-18.8C590.7,540.6,590.7,499.9,565.7,474.9z">
                                                </path>

                                                <path class="st1"
                                                    d="M254.6,509.1c140.4,0,254.5-114.2,254.5-254.5C509.1,114.2,394.9,0,254.6,0C114.2,0,0,114.2,0,254.5C0,394.9,114.2,509.1,254.6,509.1zM254.6,76.4c98.2,0,178.1,79.9,178.1,178.1s-79.9,178.1-178.1,178.1S76.4,352.8,76.4,254.5S156.3,76.4,254.6,76.4z">
                                                </path>

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

                                    @foreach($latestBlogs as $latest)

                                        <div class="rc__post d-flex align-items-center">

                                            <div class="rc__thumb me-3">

                                                <a href="{{ route('blog.show', $latest->slug) }}">

                                                    <img src="{{ Storage::url($latest->image) }}" alt="{{ $latest->title }}"
                                                        style="width:80px;height:80px;object-fit:cover;">

                                                </a>

                                            </div>

                                            <div class="rc__content">

                                                <div class="rc__meta">

                                                    <span>

                                                        {{ $latest->published_at?->format('d M, Y') }}

                                                    </span>

                                                </div>

                                                <h6 class="rc__title">

                                                    <a href="{{ route('blog.show', $latest->slug) }}">

                                                        {{ Str::limit($latest->title, 55) }}

                                                    </a>

                                                </h6>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>


                        {{-- Popular Tags --}}
                        <div class="sidebar__widget mb-30">

                            <div class="sidebar__widget-head mb-35">

                                <h4 class="sidebar__widget-title">

                                    Popular Tags

                                </h4>

                            </div>

                            <div class="sidebar__widget-content">

                                <div class="sidebar__tag">

                                    @php

                                        $tags = collect();

                                        foreach ($latestBlogs as $blog) {

                                            if ($blog->meta_keywords) {

                                                foreach (explode(',', $blog->meta_keywords) as $tag) {

                                                    $tags->push(trim($tag));

                                                }

                                            }

                                        }

                                        $tags = $tags
                                            ->filter()
                                            ->unique()
                                            ->take(20);

                                    @endphp

                                    @forelse($tags as $tag)

                                        <a href="{{ route('blog.index', ['search' => $tag]) }}">

                                            {{ $tag }}

                                        </a>

                                    @empty

                                        <span class="text-muted">

                                            No Tags

                                        </span>

                                    @endforelse

                                </div>

                            </div>

                        </div>


                        {{-- Blog Statistics --}}
                        <div class="sidebar__widget">

                            <div class="sidebar__widget-head mb-35">

                                <h4 class="sidebar__widget-title">

                                    Blog Info

                                </h4>

                            </div>

                            <div class="sidebar__widget-content">

                                <ul class="list-unstyled mb-0">

                                    <li class="d-flex justify-content-between mb-2">

                                        <span>Total Blogs</span>

                                        <strong>{{ $blogs->total() }}</strong>

                                    </li>

                                    <li class="d-flex justify-content-between">

                                        <span>Recent Posts</span>

                                        <strong>{{ $latestBlogs->count() }}</strong>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- blog area end  -->

@endsection