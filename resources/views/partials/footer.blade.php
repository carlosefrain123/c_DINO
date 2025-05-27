<footer class="section-t-space footer-section-2">
    <div class="container-fluid-lg">

        <!-- Sección de servicios destacados -->
        <div class="service-section">
            <div class="row g-3">
                <div class="col-12">
                    <div class="service-contain">
                        <!-- Producto siempre fresco -->
                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{ asset('assets/svg/product.svg') }}" class="blur-up lazyload"
                                    alt="Productos frescos">
                            </div>
                            <div class="service-detail">
                                <h5>Productos Siempre Frescos</h5>
                            </div>
                        </div>

                        <!-- Envío gratuito -->
                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{ asset('assets/svg/delivery.svg') }}" class="blur-up lazyload"
                                    alt="Envío gratis">
                            </div>
                            <div class="service-detail">
                                <h5>Envío Gratis en Compras Mayores a S/ 200</h5>
                            </div>
                        </div>

                        <!-- Descuentos diarios -->
                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{ asset('assets/svg/discount.svg') }}" class="blur-up lazyload"
                                    alt="Descuentos diarios">
                            </div>
                            <div class="service-detail">
                                <h5>Descuentos Especiales Todos los Días</h5>
                            </div>
                        </div>

                        <!-- Mejor precio del mercado -->
                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{ asset('assets/svg/market.svg') }}" class="blur-up lazyload"
                                    alt="Mejor precio">
                            </div>
                            <div class="service-detail">
                                <h5>El Mejor Precio del Mercado</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información principal del footer -->
        <div class="main-footer">
            <div class="row g-md-4 gy-sm-5 gy-2">
                <!-- Logo y redes -->
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <a href="#" class="foot-logo">
                        <img src="{{ asset('assets/images/logo/logodino2.png') }}" class="img-fluid" alt="Logo DINO S.R.L."
                            style="width: 75px;">
                    </a>
                    <p class="information-text">
                        DINO S.R.L es una empresa filial del grupo <strong>Cementos Pacasmayo</strong>, dedicada a la
                        comercialización y distribución de productos especializados para la construcción y servicios
                        asociados. </p>
                    <ul class="social-icon">
                        <li><a href="https://www.facebook.com/dinosrl" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.google.com" target="_blank"><i class="fab fa-google"></i></a></li>
                        <li><a href="https://www.twitter.com/dinosrl" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/dinosrl" target="_blank"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.pinterest.com/dinosrl" target="_blank"><i
                                    class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>

                <!-- Puedes añadir enlaces útiles aquí -->
                <div class="col-xxl-2 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Enlaces Útiles</h4>
                    </div>
                    <ul class="footer-list">
                        <li><a href="#">Tienda</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Contáctanos</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>

                <!-- Otra sección informativa -->
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Información de la Tienda</h4>
                    </div>
                    <ul class="footer-address footer-contact">
                        <li>
                            <div class="inform-box">
                                <i data-feather="phone"></i>
                                <p>Llámanos: +51 987 654 321</p>
                            </div>
                        </li>
                        <li>
                            <div class="inform-box">
                                <i data-feather="mail"></i>
                                <p>Email: soporte@dinosrl.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="inform-box">
                                <i data-feather="map-pin"></i>
                                <p>Lambayeque, Perú</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Subfooter -->
        <div class="sub-footer section-small-space">
            <div class="left-footer">
                <p>&copy; 2025 DINO S.R.L. | Desarrollado por AnderCode</p>
            </div>
            <div class="right-footer">
                <ul class="payment-box">
                    <li><img src="{{ asset('assets/images/icon/paymant/visa.png') }}" alt="Visa"></li>
                    <li><img src="{{ asset('assets/images/icon/paymant/mastercard.png') }}" alt="MasterCard"></li>
                    <li><img src="{{ asset('assets/images/icon/paymant/yape.png') }}" alt="Yape"></li>
                    <li><img src="{{ asset('assets/images/icon/paymant/plin.png') }}" alt="Plin"></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
