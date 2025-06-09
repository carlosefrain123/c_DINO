@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <!-- Blog Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4 ratio_65">
                        @foreach ($allPosts as $post)
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
                                            {{-- Es la central --}}
                                            {{-- <span class="super">
                                                <i data-feather="user"></i>
                                                <span>{{ $post->user->name }}</span>
                                            </span> --}}
                                        </div>
                                        <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                            <h3>{{ Str::limit($post->title, 60) }}</h3>
                                        </a>
                                        <div class="d-flex gap-2">
                                            @if (request()->routeIs('posts.category') && request()->slug === 'event')
                                                <button
                                                    onclick="showImageModal('{{ asset('storage/' . $post->featured_image) }}')"
                                                    class="blog-button">
                                                    Ver imagen <i class="fa-solid fa-image"></i>
                                                </button>
                                            @else
                                                <button
                                                    onclick="location.href='{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}'"
                                                    class="blog-button">
                                                    Leer Más <i class="fa-solid fa-right-long"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script>
        function showImageModal(imageUrl) {
            Swal.fire({
                html: `<img src="${imageUrl}" alt="Imagen del post" style="max-width: 100%; height: auto; border-radius: 10px;">`,
                showConfirmButton: false,
                showCloseButton: true, // 👈 Esto activa la "X"
                background: '#fff',
                width: 'auto',
                padding: '1rem',
                customClass: {
                    popup: 'rounded-4 shadow'
                }
            });
        }
    </script>
@endsection
