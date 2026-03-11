<section>
    <header class="mb-3">
        <h2 class="h5 font-heading">Información del perfil</h2>
        <p class="text-muted small mb-0">Actualizá tu nombre y correo institucional.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 small">
                    Tu email aún no está verificado.
                    <button form="send-verification" class="btn btn-link p-0 align-baseline">Reenviar verificación</button>
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-iesi">Guardar</button>

            @if (session('status') === 'profile-updated')
                <span class="small text-muted">Guardado.</span>
            @endif
        </div>
    </form>
</section>
