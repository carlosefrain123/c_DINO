@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12 col-lg-8">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-users" role="tabpanel">
                                <div class="product-tab">
                                    <div class="title d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="mb-0">Gestión de Usuarios</h2>
                                        <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-sm">
                                            <i data-feather="plus-circle" class="me-1"></i> Crear Usuario
                                        </a>
                                    </div>

                                    {{-- Mensajes --}}
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    @if ($usuarios->count() > 0)
                                        <div class="table-responsive dashboard-bg-box">
                                            <table class="table table-bordered table-striped align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
                                                        <th>Email</th>
                                                        <th>Rol</th>
                                                        <th>Registrado</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($usuarios as $usuario)
                                                        <tr>
                                                            <td>{{ $usuario->id }}</td>
                                                            <td>{{ $usuario->name }}</td>
                                                            <td>{{ $usuario->email }}</td>
                                                            <td>
                                                                <span class="badge bg-info text-dark">
                                                                    {{ ucfirst($usuario->role) }}
                                                                </span>
                                                            </td>
{{--                                                             <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
 --}}                                                            <td class="text-center">
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center gap-2">
                                                                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                                        class="btn btn-sm btn-outline-primary"
                                                                        title="Editar">
                                                                        <i data-feather="edit"></i>
                                                                    </a>

                                                                    <form
                                                                        action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                                        method="POST" class="delete-user-form"
                                                                        data-id="{{ $usuario->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            title="Eliminar">
                                                                            <i data-feather="trash-2"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{-- Paginación --}}
                                            <nav class="custom-pagination mt-4">
                                                {{ $usuarios->links('pagination::bootstrap-5') }}
                                            </nav>
                                        </div>
                                    @else
                                        <p class="mt-3">No hay usuarios registrados aún.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Feather icons --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.feather) {
                feather.replace();
            }
        });
    </script>
@endsection
