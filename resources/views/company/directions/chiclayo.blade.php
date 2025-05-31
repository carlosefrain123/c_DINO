@extends('layouts.app')

@section('content')
    <section class="contact-box-section mb-5">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="contact-title">
                            <h3>Sede Chiclayo</h3>
                        </div>
                        <div class="contact-detail">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="contact-detail-box">
                                        <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="contact-detail-title">
                                            <h4>Dirección</h4>
                                        </div>
                                        <div class="contact-detail-contain">
                                            <p>PARQUE INDUSTRIAL PIMENTEL MZ. E LT. 1 , CHICLAYO LAMBAYEQUE (REFERENCIA AL
                                                FRENTE DE LA UNIVERSIDAD SAN MARTIN DE PORRES)</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="contact-detail-box">
                                        <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                                        <div class="contact-detail-title">
                                            <h4>Teléfono</h4>
                                        </div>
                                        <div class="contact-detail-contain">
                                            <p>(+51) 044 123456</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="contact-detail-box">
                                        <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="contact-detail-title">
                                            <h4>Email</h4>
                                        </div>
                                        <div class="contact-detail-contain">
                                            <p>trujillo@dinosrl.pe</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="map-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.9216191694863!2d-79.8792303!3d-6.7793939000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cefa925074b37%3A0xa4c3b6fe32c9499c!2sDINO%20CHICLAYO!5e0!3m2!1ses!2spe!4v1748705665721!5m2!1ses!2spe"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
