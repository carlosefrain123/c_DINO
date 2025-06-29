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
                            <span class="title-leaf">
                                <svg class="icon-width bg-gray">
                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                        </div>

                        {{-- ✅ Mensajes tipo alerta Bootstrap --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        @endif

                        {{-- ✅ Mostrar errores de validación --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- ✅ Formulario --}}
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Título --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $post->title) }}" required>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Slug oculto (opcional si lo generas con JS o backend) --}}
                            <input type="hidden" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">

                            {{-- Resumen --}}
                            <div class="mb-3">
                                <label for="summary" class="form-label">Resumen</label>
                                <input type="text" name="summary" id="summary" class="form-control"
                                    value="{{ old('summary', $post->summary) }}" required>
                                @error('summary')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Contenido --}}
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenido</label>
                                <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Categorías --}}
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
                                @error('featured_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Estado --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Estado</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                                        Borrador</option>
                                    <option value="published"
                                        {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>
                                        Publicado</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Botones --}}
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="check" class="me-1"></i> Guardar
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
    {{-- 🔧 CKEditor --}}
    <script>
        let editorInstance;
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#content'), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                            'blockQuote', 'insertTable', 'undo', 'redo'
                        ]
                    },
                    language: 'es',
                    table: {
                        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                    }
                })
                .then(editor => {
                    editorInstance = editor;
                    console.log('Editor listo', editor);
                })
                .catch(error => {
                    console.error('Hubo un error con CKEditor:', error);
                });

            const form = document.getElementById('postEditForm');
            form.addEventListener('submit', function(e) {
                editorInstance.updateSourceElement();
                const contentValue = document.querySelector('#content').value.trim();
                if (contentValue.length === 0) {
                    e.preventDefault();
                    alert('⚠️ El contenido no puede estar vacío.');
                    editorInstance.editing.view.focus();
                }
            });
        });
    </script>
@endsection
