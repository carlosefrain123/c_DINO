<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <!-- Nombre -->
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control"
            value="{{ old('name', auth()->user()->name) }}" required autofocus>
    </div>

    <!-- Correo -->
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input id="email" name="email" type="email" class="form-control"
            value="{{ old('email', auth()->user()->email) }}" required>
    </div>

    <!-- Botón -->
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </div>
</form>
