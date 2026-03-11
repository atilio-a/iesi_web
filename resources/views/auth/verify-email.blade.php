<x-guest-layout>
    <p class="text-muted small mb-3">
        Gracias por registrarte. Revisá tu correo y validá tu dirección para continuar.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Se envió un nuevo enlace de verificación.
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="btn btn-iesi">Reenviar verificación</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none">Salir</button>
        </form>
    </div>
</x-guest-layout>
