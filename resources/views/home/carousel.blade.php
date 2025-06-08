<!-- Sección Principal de Inicio -->
<section class="home-search-full pt-0 overflow-hidden gradient-home">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="slider-animate">
                    {{-- El latestPosts es el carrusel, no te olvides. No contiene route --}}
                    @foreach ($latestBanners as $post)
                            <div>
                                <div class="home-contain rounded-0 p-0">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                                        class="img-fluid bg-img blur-up lazyload bg-top" alt="{{ $post->title }}">
                                    <div class="home-detail p-center text-center home-overlay position-relative">
                                        <div class="content">
                                            <h1>{{ $post->title }}</h1>
                                            <h3>{{ $post->summary }}</h3>
                                            @include('home.buscar')
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin sección de inicio -->
