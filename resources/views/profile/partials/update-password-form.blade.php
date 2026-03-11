<section>
    <header class="mb-3">
        <h2 class="h5 font-heading">Actualizar contraseña</h2>
        <p class="text-muted small mb-0">Usá una contraseña segura y recordable.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Contraseña actual</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">Nueva contraseña</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirmar contraseña</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-iesi">Guardar</button>

            @if (session('status') === 'password-updated')
                <span class="small text-muted">Actualizado.</span>
            @endif
        </div>
    </form>
</section>
