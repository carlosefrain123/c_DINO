@extends('layouts.app')

@section('title', 'Crear Publicación')

@section('content')
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12 col-lg-8">
                    <div class="dashboard-right-sidebar">
                        <div class="title">
                            <h2>Crear Nueva Publicación</h2>
                            <span class="title-leaf">
                                <svg class="icon-width bg-gray">
                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                        </div>

                        {{-- ✅ Mensaje de error tipo alerta Bootstrap --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        @endif

                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
                            class="theme-form theme-form-2 mega-form">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Título:</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="hidden" id="slug" name="slug" value="">

                            <div class="mb-3">
                                <label for="summary" class="form-label">Resumen:</label>
                                <textarea id="summary" name="summary" class="form-control" required>{{ old('summary') }}</textarea>
                                @error('summary')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Contenido:</label>
                                <textarea id="content" name="content" class="form-control" rows="6">{{ old('content') }}</textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Categoría:</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Etiquetas:</label><br>
                                @foreach ($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tags[]"
                                            value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                                        <label class="form-check-label"
                                            for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Imagen destacada:</label>
                                <input type="file" id="featured_image" name="featured_image" class="form-control">
                                @error('featured_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Estado:</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="draft">Borrador</option>
                                    <option value="published">Publicado</option>
                                </select>
                            </div>

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
