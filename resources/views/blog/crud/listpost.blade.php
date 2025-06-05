@extends('layouts.app')

@section('title', 'Mis Publicaciones')

@section('content')
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">
                        Mostrar Menú
                    </button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-product" role="tabpanel">
                                <div class="product-tab">
                                    <div class="title d-flex justify-content-between align-items-center">
                                        <h2>Mis Publicaciones</h2>
                                        <a href="{{ route('posts.create') }}" class="btn theme-bg-color btn-sm text-white">
                                            Crear Nueva
                                        </a>
                                    </div>

                                    {{-- Mensajes --}}
                                    @if (session('success'))
                                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                                    @endif

                                    @if ($posts->count() > 0)
                                        <div class="table-responsive dashboard-bg-box mt-3">
                                            <table class="table product-table align-middle">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Título</th>
                                                        <th scope="col">Categorías</th>
                                                        <th scope="col">Estado</th>
                                                        <th scope="col">Publicado</th>
                                                        <th scope="col" class="text-center">Editar / Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($posts as $post)
                                                        <tr>
                                                            <td>{{ $post->id }}</td>
                                                            <td>{{ $post->title }}</td>
                                                            <td>
                                                                @foreach ($post->categories as $category)
                                                                    <span
                                                                        class="badge bg-secondary">{{ $category->name }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>{{ ucfirst($post->status) }}</td>
                                                            <td>{{ $post->published_at ? $post->published_at->format('d/m/Y') : '-' }}
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                                    class="btn btn-sm btn-warning me-2">
                                                                    <i data-feather="edit"></i>
                                                                </a>
                                                                <form action="{{ route('posts.destroy', $post->id) }}"
                                                                    method="POST" class="d-inline"
                                                                    onsubmit="return confirm('¿Quieres eliminar esta publicación?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i data-feather="trash-2"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{-- Paginación Laravel --}}
                                            <nav class="custom-pagination">
                                                {{ $posts->links() }}
                                            </nav>
                                        </div>
                                    @else
                                        <p class="mt-3">No tienes publicaciones aún.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Feather icons JS (solo si no está cargado en tu layout) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.feather) {
                feather.replace();
            }
        });
    </script>
@endsection
