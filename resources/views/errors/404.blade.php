@extends('layouts.app')

@section('title', 'Página no encontrada')

@section('content')
    <!-- Sección 404 Inicio -->
    <section class="section-404 section-lg-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="image-404">
                        <img src="{{ asset('assets/images/inner-page/404.png') }}" class="img-fluid blur-up lazyload"
                            alt="Página no encontrada">
                    </div>
                </div>

                <div class="col-12">
                    <div class="contain-404 text-center">
                        <h3 class="text-content">
                            La página que estás buscando no pudo ser encontrada.
                            Es posible que el enlace esté desactualizado o que el contenido haya sido movido.
                        </h3>
                        <button onclick="location.href = '{{ route('home') }}';"
                            class="btn btn-md text-white theme-bg-color mt-4 mx-auto">
                            Volver al inicio de DINO S.R.L.
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sección 404 Fin -->
@endsection
