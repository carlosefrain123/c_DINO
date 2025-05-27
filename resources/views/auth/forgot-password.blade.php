@extends('layouts.app')

@section('title', 'Olvidaste la contraseña')

@section('content')
    <!-- Sección de Breadcrumb -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Recuperar Contraseña</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Olvidaste la Contraseña</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de Breadcrumb -->

    <!-- Sección de Recuperación de Contraseña -->
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <!-- Imagen decorativa -->
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('assets/images/inner-page/forgot.png') }}" class="img-fluid"
                            alt="Recuperar contraseña">
                    </div>
                </div>

                <!-- Formulario de recuperación -->
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title text-center">
                                <h3>Bienvenido a DINO S.R.L.</h3>
                                <h4>¿Olvidaste tu contraseña?</h4>
                                <p>Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                                </p>
                            </div>

                            <div class="input-box">
                                <form class="row g-4" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Correo electrónico" required>
                                            <label for="email">Correo Electrónico</label>
                                            @error('email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-animation w-100" type="submit">Enviar enlace</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de sección -->
@endsection
