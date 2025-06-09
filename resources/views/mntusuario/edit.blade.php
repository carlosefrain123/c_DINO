@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="dashboard-right-sidebar">
                        <div class="title mb-4">
                            <h2>Editar Usuario</h2>
                            <span class="title-leaf">
                                <svg class="icon-width bg-gray">
                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                        </div>

                        {{-- Mensajes --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        {{-- Formulario --}}
                        <form action="{{ route('users.update', $user->id) }}" method="POST" class="theme-form theme-form-2 mega-form">
                            @csrf
                            @method('PUT')

                            {{-- Nombre --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Correo --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Contraseña (opcional) --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Nueva contraseña (opcional):</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Solo si deseas cambiarla">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Botones --}}
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="check" class="me-1"></i> Guardar
                                </button>

                                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                    <i data-feather="x" class="me-1"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
