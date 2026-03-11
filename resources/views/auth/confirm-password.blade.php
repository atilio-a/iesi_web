<x-guest-layout>
    <p class="text-muted small mb-3">
        Esta es un área segura. Confirmá tu contraseña para continuar.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end">
            <button class="btn btn-iesi">Confirmar</button>
        </div>
    </form>
</x-guest-layout>
