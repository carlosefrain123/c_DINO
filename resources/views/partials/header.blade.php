<!-- Header Start -->
<header class="header-2">
    <!-- Notificación superior -->
    <div class="header-notification theme-bg-color overflow-hidden py-2">
        <div class="notification-slider">
            <div>
                <div class="timer-notification text-center">
                    <h6>
                        <strong class="me-1">¡Bienvenido a DINO S.R.L.!</strong>
                        Nos especializamos en soluciones innovadoras para la construcción en el norte del Perú.
                        <strong class="ms-1">¡Comprometidos con la calidad!</strong>
                    </h6>
                </div>
            </div>

            <div>
                <div class="timer-notification text-center">
                    <h6>
                        Más que productos, brindamos confianza y experiencia en cada proyecto.
                        <a href="{{ route('company.about') }}" class="text-white">Conoce más sobre nosotros</a>
                    </h6>
                </div>
            </div>
        </div>
        <!-- Botón para cerrar la notificación -->
        <button class="btn close-notification">
            <span>Cerrar</span> <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="top-nav top-header sticky-header pb-3 pb-xl-2">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <!-- Botón hamburguesa -->
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button me-2" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </button>

                        <!-- Logo -->
                        <a href="{{ route('home') }}" class="web-logo nav-logo">
                            <img src="{{ asset('assets/images/logo/logodino2.png') }}"
                                class="img-fluid blur-up lazyload" alt="Logo DINO">
                        </a>

                        <!-- Menú de navegación -->
                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menú</h5>
                                        <button class="btn-close lead" type="button"
                                            data-bs-dismiss="offcanvas"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <!-- Menú INICIO con secciones ancla -->
                                            <li class="nav-item dropdown dropdown-mega">
                                                <a class="nav-link dropdown-toggle ps-xl-2 ps-0"
                                                    href="javascript:void(0)" data-bs-toggle="dropdown">Inicio</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('home') }}#faq">FAQ</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('home') }}#values">Quiénes Somos</a>
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

                                            <!-- Menú Compañía con submenú de sedes -->
                                            <li class="nav-item dropdown new-nav-item">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Compañía</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('company.about') }}">Nosotros</a>
                                                    </li>
                                                    <li class="sub-dropdown-hover">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            Direcciones <span class="new-text"><i
                                                                    class="fa-solid fa-bolt-lightning"></i></span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a
                                                                    href="{{ route('company.directions.cajamarca') }}">Cajamarca</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.chiclayo') }}">Chiclayo</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.chimbote') }}">Chimbote</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.moche') }}">Moche</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.pacasmayo') }}">Pacasmayo</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.piura') }}">Piura</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.tarapoto') }}">Tarapoto</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('company.directions.trujillo') }}">Trujillo</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <!-- Blog -->
                                            <li class="nav-item">
                                                <a class="nav-link ps-xl-2 ps-0 no-icon"
                                                    href="{{ route('blog.index') }}">
                                                    Blog
                                                </a>
                                            </li>

                                            <!-- List -->
                                            {{-- <li class="nav-item">
                                                <a class="nav-link ps-xl-2 ps-0 no-icon"
                                                    href="{{ route('blog.list') }}">
                                                    List
                                                </a>
                                            </li> --}}

                                            <li class="nav-item">
                                                <a class="nav-link ps-xl-2 ps-0 no-icon {{ Route::is('posts.category') && request()->slug == 'project' ? 'active' : '' }}"
                                                    href="{{ route('posts.category', ['slug' => 'project']) }}">
                                                    Proyectos
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link ps-xl-2 ps-0 no-icon {{ Route::is('posts.category') && request()->slug == 'event' ? 'active' : '' }}"
                                                    href="{{ route('posts.category', ['slug' => 'event']) }}">
                                                    Eventos
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link ps-xl-2 ps-0 no-icon {{ Route::is('posts.category') && request()->slug == 'notice' ? 'active' : '' }}"
                                                    href="{{ route('posts.category', ['slug' => 'notice']) }}">
                                                    Noticias
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Íconos lado derecho -->
                        <div class="rightside-box">
                            <!-- Buscador -->
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

                            <ul class="right-side-menu">
                                <li class="right-side"></li>

                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            @auth
                                                <h6>Hola,</h6>
                                                <h5>{{ Auth::user()->name }}</h5>
                                            @else
                                                <h6>Hola,</h6>
                                                <h5>Mi cuenta</h5>
                                            @endauth
                                        </div>
                                    </div>

                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            @guest
                                                <li class="product-box-contain">
                                                    <a href="{{ route('login') }}">Iniciar sesión</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('register') }}">Registrarse</a>
                                                </li>
                                            @else
                                                <li class="product-box-contain">
                                                    <a href="{{-- {{ route('posts.list') }} --}}">Mis Publicaciones</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{-- {{ route('profile.edit') }} --}}">Perfil</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Cerrar sesión
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div> <!-- /.rightside-box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
