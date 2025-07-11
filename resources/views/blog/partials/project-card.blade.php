@extends('layouts.app')

@section('title', 'Proyecto')

@section('content')
    <!-- Blog Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4 ratio_65">
                        @foreach ($allPosts as $post)
                            @if ($post->categories->contains('slug', 'project'))
                                <div class="col-xxl-4 col-sm-6">
                                    <div class="blog-box wow fadeInUp">
                                        <div class="blog-image">
                                            <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <img src="{{ asset('storage/' . $post->featured_image) }}"
                                                    class="bg-img blur-up lazyload" alt="">
                                            </a>
                                        </div>

                                        <div class="blog-contain">
                                            <div class="blog-label">
                                                <span class="time">
                                                    <i data-feather="clock"></i>
                                                    <span>{{ $post->published_at->format('d M, Y') }}</span>
                                                </span>
                                                {{-- <span class="super">
                                                    <i data-feather="user"></i>
                                                    <span>{{ $post->user->name }}</span>
                                                </span> --}}
                                            </div>
                                            <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <h3>{{ Str::limit($post->title, 60) }}</h3>
                                            </a>
                                            <button
                                                onclick="location.href='{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}'"
                                                class="blog-button">
                                                Read More <i class="fa-solid fa-right-long"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- Paginación --}}
                    <nav class="custom-pagination mt-4">
                        {{ $allPosts->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
                @include('blog.partials.leftSidebar')
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
