<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="change-password-modal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                @method('PATCH')

                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    {{-- Contraseña actual --}}
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Contraseña actual</label>
                        <input id="current_password" name="current_password" type="password" class="form-control"
                            required autocomplete="current-password">
                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Nueva contraseña --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva contraseña</label>
                        <input id="password" name="password" type="password" class="form-control" required
                            autocomplete="new-password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Confirmar nueva contraseña --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control" required autocomplete="new-password">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
