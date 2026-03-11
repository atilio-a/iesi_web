<section>
    <header class="mb-3">
        <h2 class="h5 font-heading">Eliminar cuenta</h2>
        <p class="text-muted small mb-0">
            Al eliminar tu cuenta se borrarán todos tus datos de forma permanente.
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('¿Confirmás eliminar tu cuenta?');">
        @csrf
        @method('delete')

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" />
            @if ($errors->userDeletion->has('password'))
                <div class="text-danger small mt-1">{{ $errors->userDeletion->first('password') }}</div>
            @endif
        </div>

        <button class="btn btn-outline-danger">Eliminar cuenta</button>
    </form>
</section>
