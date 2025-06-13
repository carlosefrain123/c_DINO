@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <!-- Sección de Migas de Pan (Breadcrumb) -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2 class="mb-2">Iniciar Sesión</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Iniciar Sesión</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de Migas de Pan -->

    <!-- Sección de Inicio de Sesión -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <!-- Imagen Lateral -->
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="../assets/images/inner-page/log-in.png" class="img-fluid" alt="Imagen Login DINO">
                    </div>
                </div>

                <!-- Formulario -->
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Bienvenido a Empresa x S.A.C</h3>
                            <h4>Inicia sesión en tu cuenta</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Correo Electrónico" required>
                                        <label for="email">Correo Electrónico</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Contraseña" required>
                                        <label for="password">Contraseña</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault" name="remember">
                                            <label class="form-check-label" for="flexCheckDefault">Recordarme</label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="forgot-password">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">
                                        Iniciar Sesión
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Otra forma de inicio de sesión -->
                        <div class="other-log-in">
                            <h6>o</h6>
                        </div>

                        <!-- Enlace a registro -->
                        <div class="sign-up-box">
                            <h4>¿No tienes una cuenta?</h4>
                            <a href="{{ route('register') }}">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de sección de Inicio de Sesión -->
@endsection
