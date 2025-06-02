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
                        <a href="{{ route('home') }}" class="web-logo nav-logo">
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
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="main-nav">
                    <div class="header-nav-left">
                        <button class="dropdown-category dropdown-category-2">
                            <i class="iconly-Category icli"></i>
                            <span>All Categories</span>
                        </button>

                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">
                                <li class="onhover-category-list">
                                    <a href="javascript:void(0)" class="category-name">
                                        <img src="{{ asset('assets/svg/1/vegetable.svg') }}" alt="">
                                        <h6>Vegetables & Fruit</h6>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>

                                    <div class="onhover-category-box">
                                        <div class="list-1">
                                            <div class="category-title-box">
                                                <h5>Organic Vegetables</h5>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">Potato & Tomato</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Cucumber & Capsicum</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Leafy Vegetables</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Root Vegetables</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Beans & Okra</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Cabbage & Cauliflower</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Gourd & Drumstick</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Specialty</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="list-2">
                                            <div class="category-title-box">
                                                <h5>Fresh Fruit</h5>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">Banana & Papaya</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Kiwi, Citrus Fruit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Apples & Pomegranate</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Seasonal Fruits</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Mangoes</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Fruit Baskets</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="onhover-category-list">
                                    <a href="javascript:void(0)" class="category-name">
                                        <img src="../assets/svg/1/cup.svg" alt="">
                                        <h6>Beverages</h6>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>

                                    <div class="onhover-category-box w-100">
                                        <div class="list-1">
                                            <div class="category-title-box">
                                                <h5>Energy & Soft Drinks</h5>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">Soda & Cocktail Mix</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Soda & Cocktail Mix</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Sports & Energy Drinks</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Non Alcoholic Drinks</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Packaged Water</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Spring Water</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Flavoured Water</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                        <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                            <div class="offcanvas-header navbar-shadow">
                                <h5>Menu</h5>
                                <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown dropdown-mega">
                                        <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Inicio</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('home') }}#faq">FAQ</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('home') }}#values">Quiénes
                                                    Somos</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('home') }}#join_us">Elíjenos</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('home') }}#services">Servicios</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('home') }}#why_choose_us">Únete</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('home') }}#recent_projects">Proyectos</a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li class="nav-item dropdown new-nav-item">
                                        {{-- <label class="new-dropdown">New</label> --}}
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Compañia</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('company.about') }}">Nosotros</a>
                                            </li>
                                            <li class="sub-dropdown-hover">
                                                <a class="dropdown-item" href="javascript:void(0)">Direcciones<span
                                                        class="new-text"><i
                                                            class="fa-solid fa-bolt-lightning"></i></span></a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a
                                                            href="{{ route('company.directions.cajamarca') }}">Cajamarca</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{ route('company.directions.chiclayo') }}">Chiclayo</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{ route('company.directions.chimbote') }}">Chimbote</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('company.directions.moche') }}">Moche</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{ route('company.directions.pacasmayo') }}">Pacasmayo</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('company.directions.piura') }}">Piura</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{ route('company.directions.tarapoto') }}">Tarapoto</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{ route('company.directions.trujillo') }}">Trujillo</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-xl-2 ps-0 no-icon" href="{{ route('blog.index') }}">
                                            Blog
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="right-nav">
                        <div class="nav-number">
                            <img src="{{ asset('assets/images/icon/music.png') }}" class="img-fluid blur-up lazyload"
                                alt="">
                            <span>(123) 456 7890</span>
                        </div>
                        <a href="javascript:void(0)" class="btn theme-bg-color ms-3 fire-button"
                            data-bs-toggle="modal" data-bs-target="#deal-box">
                            <div class="fire">
                                <img src="{{ asset('assets/images/icon/hot-sale.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <span>Hot Deals</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
