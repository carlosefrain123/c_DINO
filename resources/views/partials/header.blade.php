<header class="header-2">
    <!-- Notificación superior -->
    <div class="header-notification theme-bg-color overflow-hidden py-2">
        <div class="notification-slider">
            <div>
                <div class="timer-notification text-center">
                    <h6>
                        <strong class="me-1">¡Bienvenido a DINO!</strong>
                        Disfruta de nuevas ofertas y regalos todos los días durante los fines de semana.
                        <strong class="ms-1">¡Mucho por descubrir!</strong>
                    </h6>
                </div>
            </div>

            <div>
                <div class="timer-notification text-center">
                    <h6>
                        ¡Algo que te encanta ahora está en promoción!
                        <a href="{{ url('shop-left-sidebar') }}" class="text-white">¡Compra ahora!</a>
                    </h6>
                </div>
            </div>
        </div>

        <!-- Botón para cerrar la notificación -->
        <button class="btn close-notification">
            <span>Cerrar</span> <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Barra de navegación superior -->
    <div class="top-nav top-header sticky-header sticky-header-3">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">

                        <!-- Botón hamburguesa para menú en móviles -->
                        <button class="navbar-toggler d-xl-none d-block p-0 me-3" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="iconly-Category icli theme-color"></i>
                            </span>
                        </button>

                        <!-- Logo -->
                        <a href="#" class="web-logo nav-logo">
                            <img src="{{ asset('assets/images/logo/logodino2.png') }}"
                                class="img-fluid blur-up lazyload" alt="Logo DINO" style="width: 75px;">
                        </a>

                        <!-- Buscador flotante -->
                        <div class="search-full">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="search" class="font-light"></i>
                                </span>
                                <input type="text" class="form-control search-type" placeholder="Buscar aquí...">
                                <span class="input-group-text close-search">
                                    <i data-feather="x" class="font-light"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Buscador en escritorio -->
                        <div class="middle-box">
                            <div class="center-box">
                                <div class="searchbar-box order-xl-1 d-none d-xl-block">
                                    <input type="search" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Busca productos y recíbelos en tu puerta...">
                                    <button class="btn search-button">
                                        <i class="iconly-Search icli"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Menú derecho -->
                        <div class="rightside-menu">
                            <div class="option-list">
                                <ul>
                                    <!-- Ícono perfil -->
                                    <li>
                                        <a href="javascript:void(0)" class="header-icon user-icon search-icon">
                                            <i class="iconly-Profile icli"></i>
                                        </a>
                                    </li>

                                    <!-- Ícono búsqueda -->
                                    <li>
                                        <a href="javascript:void(0)" class="header-icon search-box search-icon">
                                            <i class="iconly-Search icli"></i>
                                        </a>
                                    </li>

                                    <!-- Favoritos -->
                                    <li class="onhover-dropdown">
                                        <a href="#" class="header-icon swap-icon">
                                            <small id="wishlist-count" class="badge-number">0</small>
                                            <i class="iconly-Heart icli"></i>
                                        </a>
                                    </li>

                                    <!-- Carrito -->
                                    <li class="onhover-dropdown">
                                        <a href="#" class="header-icon bag-icon">
                                            <small id="cart-count-uno" class="badge-number">0</small>
                                            <i class="iconly-Bag-2 icli"></i>
                                        </a>
                                        <div class="onhover-div">
                                            <ul class="cart-list" id="cart-dropdown">
                                                <!-- Productos del carrito se insertan dinámicamente -->
                                            </ul>

                                            <div class="price-box">
                                                <h5>Total:</h5>
                                                <small>+ Envío</small>
                                                <h4 class="theme-color fw-bold" id="cart-dropdown-total">$ 0.00</h4>
                                            </div>

                                            <div class="button-group">
                                                <a href="#" class="btn btn-sm cart-button">Ver Carrito</a>
                                                <a href="checkout.html"
                                                    class="btn btn-sm cart-button theme-bg-color text-white">
                                                    Proceder al Pago
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Perfil/Usuario -->
                                    <li class="onhover-dropdown">
                                        <a href="javascript:void(0)" class="header-icon swap-icon">
                                            <i class="iconly-Profile icli"></i>
                                        </a>
                                    </li>

                                    <!-- Sesión del usuario -->
                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <div class="delivery-detail">
                                                <h6>Hola,</h6>
                                                <h5>{{ Auth::user()->name ?? 'Mi Cuenta' }}</h5>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                @auth
                                                    <!-- Usuario autenticado -->
                                                    <li class="product-box-contain">
                                                        <a href="#">Mi Perfil</a>
                                                    </li>

                                                    <li class="product-box-contain">
                                                        <form method="POST" action="{{ route('logout') }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            <a href="#"
                                                                onclick="event.preventDefault(); this.closest('form').submit();"
                                                                class="text-danger">
                                                                Cerrar Sesión
                                                            </a>
                                                        </form>
                                                    </li>
                                                @else
                                                    <!-- Usuario no autenticado -->
                                                    <li class="product-box-contain">
                                                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                                                    </li>

                                                    <li class="product-box-contain">
                                                        <a href="{{ route('register') }}">Registrarse</a>
                                                    </li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- /.rightside-menu -->

                    </div> <!-- /.navbar-top -->
                </div>
            </div>
        </div>
    </div>
</header>
