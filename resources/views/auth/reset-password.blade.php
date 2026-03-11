<x-guest-layout>
    <h2 class="h5 font-heading mb-3">Restablecer contraseña</h2>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end">
            <button class="btn btn-iesi">Guardar</button>
        </div>
    </form>
</x-guest-layout>
