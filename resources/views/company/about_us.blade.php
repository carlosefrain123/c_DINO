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
                                    <img src="{{ asset('assets/images/dino/1.jpg') }}" class="bg-img blur-up lazyload"
                                        alt="Equipo DINO">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="fresh-image">
                                <div>
                                    <img src="{{ asset('assets/images/dino/2.jpg') }}" class="bg-img blur-up lazyload"
                                        alt="Almacén DINO">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="review-title">
                                <h2>Comprometidos con la construcción, la eficiencia y el desarrollo sostenible</h2>
                            </div>

                            <div class="delivery-list">
                                <p class="text-content">
                                    DINO S.R.L. (Distribuidora Norte Pacasmayo) es una empresa con más de una década de
                                    trayectoria en el rubro de la construcción. Especializada en la distribución de concreto
                                    premezclado, bloques de concreto, Rapimix, viguetas y bovedillas, ladrillos de cemento y
                                    Cemento Pacasmayo. Nuestro compromiso se basa en ofrecer productos de calidad, logística
                                    eficiente y atención personalizada en todo el norte del Perú.
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
                                                <h5 class="text">Compromiso con el medio ambiente</h5>
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
                                                <h5 class="text">Productos certificados y de calidad</h5>
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

    <!-- FUNDADOR -->
    <section class="seller-poster-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 order-lg-2">
                    <div class="poster-box">
                        <div class="poster-image"
                            style="height: 100%; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('assets/images/team/team1.jpg') }}" alt="Fundador DINO S.R.L."
                                style="width: 500px; max-height: 500px; object-fit: cover; border-radius: 10px;">
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="seller-title h-100 d-flex">
                        <div class="mt-0 mt-xl-5">
                            <h2>Historia de DINO</h2>
                            <p class="text-content">
                                Distribuidora Norte Pacasmayo SRL (DINO) es la empresa líder en la distribución de
                                materiales para la construcción en el norte y oriente del Perú. DINO Inició sus operaciones
                                en el año 1995 y ahora cuenta con plantas de producción en 6 ciudades del norte del Perú,
                                además de la red de distribución minorista más grande del país compuesta por más de 140
                                clientes, asociados al abasteciendo los principales depósitos de materiales y ferreterías.
                                DINO ofrece una variedad de productos de marcas reconocidas especializándose en cemento,
                                pero también en concreto, bloques, adoquines y fierro para la construcción y en servicios de
                                Pavimentación en Concreto y Encofrados de Aluminio
                                En este año 2025, Distribuidora Norte Pacasmayo, DINO, plantea cambios en las líneas de
                                producción de su planta en Chiclayo. Así, la empresa buscara estar alineada con las
                                exigencias del mercado de concreto premezclado, según informo al Ministerio de Producción
                                (PRODUCE)

                            </p>
                            {{-- <p>
                                Gracias a su enfoque estratégico, DINO S.R.L. ha logrado expandir su cobertura en el norte
                                del país sin perder su esencia: compromiso, eficiencia y atención cercana.
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
