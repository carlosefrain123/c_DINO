<footer class="section-t-space footer-section-2">
    <div class="container-fluid-lg">
        <!-- Información principal del footer -->
        <div class="main-footer">
            <div class="row g-md-4 gy-sm-5 gy-2">
                <!-- Logo y redes -->
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <a href="{{ route('home') }}" class="foot-logo">
                        <img src="{{ asset('assets/images/logo/8.png') }}" class="img-fluid" alt="Logo Empresa X"
                            style="width: 75px;">
                    </a>
                    <p class="information-text">
                        EMPRESA X S.A.C. es una organización dedicada a la distribución y comercialización de productos
                        especializados, brindando soluciones integrales con enfoque en calidad, eficiencia y
                        sostenibilidad.
                    </p>
                    <ul class="social-icon">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>

                <!-- Enlaces útiles -->
                <div class="col-xxl-2 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Enlaces Útiles</h4>
                    </div>
                    <ul class="footer-list">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Contáctanos</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>

                <!-- Información de contacto -->
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Contáctanos</h4>
                    </div>
                    <ul class="footer-address footer-contact">
                        <li>
                            <div class="inform-box">
                                <i data-feather="phone"></i>
                                <p>Teléfono: +51 900 000 000</p>
                            </div>
                        </li>
                        <li>
                            <div class="inform-box">
                                <i data-feather="mail"></i>
                                <p>Email: contacto@empresax.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="inform-box">
                                <i data-feather="map-pin"></i>
                                <p>Dirección: Lima, Perú</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Subfooter -->
        <div class="sub-footer section-small-space">
            <div class="left-footer">
                <p>&copy; 2025 EMPRESA X S.A.C. | Todos los derechos reservados</p>
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
