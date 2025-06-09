@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        @foreach ($post->categories as $category)
                            <h2>{{ $category->name }}</h2>
                        @endforeach
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Blog</li>
                                <li class="breadcrumb-item active">Blog Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Details Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                @include('blog.partials.leftSidebar')
                <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50">
                    <div class="blog-detail-image rounded-3 mb-4">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="bg-img blur-up lazyload"
                            alt="">
                        <div class="blog-image-contain">
                            <h2>{{ $post->title }}</h2>
                            <ul class="contain-comment-list">
                                {{-- <li>
                                    <div class="user-list">
                                        <i data-feather="user"></i>
                                        <span>{{ $post->user->name }}</span>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="user-list">
                                        <i data-feather="calendar"></i>
                                        <span>{{ $post->published_at->translatedFormat('d F Y') }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="blog-detail-contain">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
