@extends('layouts.app')

@section('title', 'Editar Publicación')

@section('content')
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="dashboard-right-sidebar">
                        <div class="title mb-4">
                            <h2>Editar Publicación</h2>
                        </div>

                        {{-- Mostrar errores de validación --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Formulario --}}
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Título --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $post->title) }}" required>
                            </div>

                            {{-- Resumen --}}
                            <div class="mb-3">
                                <label for="summary" class="form-label">Resumen</label>
                                <input type="text" name="summary" id="summary" class="form-control"
                                    value="{{ old('summary', $post->summary) }}" required>
                            </div>

                            {{-- Contenido --}}
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenido</label>
                                <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $post->content) }}</textarea>
                            </div>

                            {{-- Categorías (checkbox múltiples) --}}
                            <div class="mb-3">
                                <label class="form-label">Categorías</label>
                                <div class="row">
                                    @foreach ($categories as $category)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="categories[]"
                                                    value="{{ $category->id }}" id="cat{{ $category->id }}"
                                                    {{ in_array($category->id, old('categories', $post->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="cat{{ $category->id }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Imagen destacada --}}
                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Imagen destacada</label>
                                <input type="file" name="featured_image" id="featured_image" class="form-control">
                                @if ($post->featured_image)
                                    <p class="mt-2">Imagen actual:</p>
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Imagen actual"
                                        width="200">
                                @endif
                            </div>

                            {{-- Estado --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Estado</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                                        Borrador</option>
                                    <option value="published"
                                        {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Publicado
                                    </option>
                                </select>

                            </div>
                            {{-- Botones --}}
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="check" class="me-1"></i> Actualizar
                                </button>

                                <a href="{{ route('posts.userPosts') }}" class="btn btn-secondary">
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
