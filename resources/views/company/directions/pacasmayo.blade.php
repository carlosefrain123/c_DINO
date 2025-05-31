@extends('layouts.app')

@section('content')
    <section class="contact-box-section mb-5">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="contact-title">
                            <h3>Sede Pacasmayo</h3>
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
                                            <p>PANAMERICANA NORTE 666 ZONA INDUSTRIAL -
                                                PACASMAYO - PACASMAYO - LA LIBERTAD</p>
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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.485064470139!2d-79.55317782247619!3d-7.411442860368259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904d4fd8bdbf70db%3A0x8022006d025e3de6!2sDINO%20SRL!5e0!3m2!1ses!2spe!4v1748708678431!5m2!1ses!2spe"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
