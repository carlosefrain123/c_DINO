<!-- Sección Principal de Inicio -->
<section class="home-search-full pt-0 overflow-hidden gradient-home">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="slider-animate">
                    {{-- El latestPosts es el carrusel, no te olvides. No contiene route --}}
                    @foreach ($latestPosts as $post)
                        <div>
                            <div class="home-contain rounded-0 p-0">
                                <img src="{{ asset('assets/images/veg-3/banner/' . $post->featured_image) }}"
                                    class="img-fluid bg-img blur-up lazyload bg-top" alt="{{ $post->title }}">
                                <div class="home-detail p-center text-center home-overlay position-relative">
                                    <div class="content">
                                        <h1>{{ $post->title }}</h1>
                                        <h3>{{ $post->summary }}</h3>
                                        <div class="search-box input-group">
                                            <input type="search" class="form-control" placeholder="Estoy buscando...">
                                            <div class="input-group-text">
                                                <select class="form-select">
                                                    <option selected="">Selecciona categoría</option>
                                                    @foreach ($post->categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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

<!-- Sección de categorías destacadas -->
<section class="feature-category-panel pt-0">
    <div class="container-fluid-lg">
        <div class="row justify-content-center">
            <div class="col-sm-9">
                <div class="feature-panel-slider no-arrow">
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Cemento</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Concreto Premezclado</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Fierro</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Tuberías</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Bloques y Adoquines</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Pinturas</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Herramientas</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Maquinaria</span></a></div>
                    <div><a href="shop-left-sidebar.html" class="cate-box"><span>Servicios Técnicos</span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin sección de categorías destacadas -->
