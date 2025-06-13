@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    {{-- Alerta si se actualizó el perfil --}}
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success text-center mx-3">
            ¡Perfil actualizado correctamente!
        </div>
    @endif

    {{-- Alerta si se actualizó la contraseña --}}
    @if (session('status') === 'password-updated')
        <div class="alert alert-success text-center mx-3">
            ¡Contraseña actualizada con éxito!
        </div>
    @endif


    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="{{ asset('assets/images/inner-page/cover-img.jpg') }}"
                                    class="img-fluid blur-up lazyload" alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/images/logo/8.png') }}"
                                            class="blur-up lazyload update_img" alt="">
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{ Auth::user()->name ?? 'Mi Cuenta' }}</h3>
                                    <h6 class="text-content">{{ Auth::user()->email ?? 'Mi Cuenta' }}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"><i
                                        data-feather="user"></i>
                                    Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"><i
                                        data-feather="settings"></i>
                                    Setting</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <button class="nav-link" id="pills-out-tab" data-bs-toggle="pill" type="button"
                                    role="tab"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i> Log Out
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-tab dashboard-bg-box">
                                        <div class="dashboard-title dashboard-flex">
                                            <h3>Profile Name</h3>
                                            <button class="btn btn-sm theme-bg-color text-white" data-bs-toggle="modal"
                                                data-bs-target="#edit-profile">Edit Profile</button>
                                        </div>

                                        <ul>
                                            <li>
                                                <h5>Nombre :</h5>
                                                <h5>{{ Auth::user()->name ?? 'Mi Cuenta' }}</h5>
                                            </li>
                                            <li>
                                                <h5>Correo :</h5>
                                                <h5>{{ Auth::user()->email ?? 'Mi Cuenta' }}</h5>
                                            </li>
                                            <li>
                                                <h5>Año de Creación:</h5>
                                                <h5>{{ Auth::user()->created_at->format('Y') ?? 'Mi Cuenta' }}</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-security" role="tabpanel">
                                <div class="dashboard-privacy">
                                    <div class="title">
                                        <h2>Configuración</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Seguridad</h3>
                                        </div>
                                        <button class="btn theme-bg-color btn-md fw-bold mt-2 text-white" type="button"
                                            data-bs-toggle="modal" data-bs-target="#change-password-modal">
                                            Cambiar contraseña
                                        </button>
                                        @include('profile.partials.update-password-form')
                                    </div>


                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Eliminar cuenta</h3>
                                        </div>

                                        @if (session('status') === 'account-deleted')
                                            <div class="alert alert-success">¡Tu cuenta ha sido eliminada correctamente!
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('profile.destroy') }}">
                                            @csrf
                                            @method('DELETE')

                                            <div class="privacy-box">
                                                <div
                                                    class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                    <input class="form-check-input" type="radio" id="usable"
                                                        name="reason" value="no_usable">
                                                    <label class="form-check-label ms-2" for="usable">Ya no la
                                                        necesito</label>
                                                </div>
                                            </div>

                                            <div class="privacy-box">
                                                <div
                                                    class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                    <input class="form-check-input" type="radio" id="account"
                                                        name="reason" value="switch_account">
                                                    <label class="form-check-label ms-2" for="account">Quiero cambiar de
                                                        cuenta</label>
                                                </div>
                                            </div>

                                            <div class="privacy-box">
                                                <div
                                                    class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                    <input class="form-check-input" type="radio" id="other-2"
                                                        name="reason" value="other">
                                                    <label class="form-check-label ms-2" for="other-2">Otro
                                                        motivo</label>
                                                </div>
                                            </div>

                                            <div class="mb-3 mt-4">
                                                <label for="password" class="form-label">Confirma tu contraseña para
                                                    eliminar tu cuenta:</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" required>
                                                @error('password', 'userDeletion')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>

                                            <button class="btn theme-bg-color btn-md fw-bold mt-2 text-white"
                                                type="submit" id="deleteAccountBtn">
                                                Eliminar mi cuenta
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de edición de perfil -->
    <div class="modal fade" id="edit-profile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- <- cambio aquí -->
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>
        </div>
    </div>
@endsection
