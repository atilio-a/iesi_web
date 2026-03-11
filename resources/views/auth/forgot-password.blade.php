<x-guest-layout>
    <p class="text-muted small mb-3">
        ¿Olvidaste tu contraseña? Ingresá tu email y te enviaremos un enlace para restablecerla.
    </p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end">
            <button class="btn btn-iesi">Enviar enlace</button>
        </div>
    </form>
</x-guest-layout>
