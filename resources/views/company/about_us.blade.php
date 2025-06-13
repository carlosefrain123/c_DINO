@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <!-- SOBRE NOSOTROS -->
    <section class="fresh-vegetable-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
                <div class="col-xl-6 col-12">
                    <div class="row g-sm-4 g-2">
                        <div class="col-6">
                            <div class="fresh-image-2">
                                <div>
                                    <img src="{{ asset('assets/images/projects/project1.jpg') }}" class="bg-img blur-up lazyload"
                                        alt="Equipo de trabajo">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="fresh-image">
                                <div>
                                    <img src="{{ asset('assets/images/projects/project2.jpg') }}" class="bg-img blur-up lazyload"
                                        alt="Centro de operaciones">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="review-title">
                                <h2>Comprometidos con el desarrollo sostenible, la eficiencia y la innovación</h2>
                            </div>

                            <div class="delivery-list">
                                <p class="text-content">
                                    EMPRESA X S.A.C. es una organización con una sólida trayectoria en el rubro de servicios
                                    y distribución especializada. Nuestra propuesta de valor combina productos de alta
                                    calidad, procesos optimizados y una atención personalizada que busca generar confianza y
                                    satisfacción en nuestros clientes.
                                </p>

                                <ul class="delivery-box">
                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="{{ asset('assets/images/icon-image/fact3.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </div>
                                            <div class="delivery-detail">
                                                <h5 class="text">Procesos rápidos y eficientes</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="{{ asset('assets/images/icon-image/fact4.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </div>
                                            <div class="delivery-detail">
                                                <h5 class="text">Compromiso ambiental y social</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="{{ asset('assets/images/icon-image/service-icon2.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </div>
                                            <div class="delivery-detail">
                                                <h5 class="text">Productos certificados y confiables</h5>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FUNDADOR / HISTORIA -->
    <section class="seller-poster-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 order-lg-2">
                    <div class="poster-box">
                        <div class="poster-image"
                            style="height: 100%; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('assets/images/projects/project3.jpg') }}" alt="Fundador de la empresa"
                                style="width: 500px; max-height: 500px; object-fit: cover; border-radius: 10px;">
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="seller-title h-100 d-flex">
                        <div class="mt-0 mt-xl-5">
                            <h2>Nuestra historia</h2>
                            <p class="text-content">
                                EMPRESA X S.A.C. inició sus operaciones en el año [AÑO DE FUNDACIÓN] con el propósito de
                                brindar soluciones eficientes y sostenibles en el ámbito de [rubro o industria]. A lo largo
                                de los años, ha consolidado su presencia a nivel regional, desarrollando una red de atención
                                ágil y una oferta variada de productos y servicios enfocados en la calidad y la innovación.
                            </p>
                            <p class="text-content">
                                En la actualidad, seguimos apostando por la modernización de nuestras operaciones y la
                                expansión de nuestras capacidades productivas, alineándonos con las exigencias del mercado y
                                los estándares técnicos más rigurosos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
