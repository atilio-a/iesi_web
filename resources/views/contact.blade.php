@extends('layouts.app')

@section('title', 'Contacto | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 720px;">
            <h1 class="display-6 font-heading">Contacto</h1>
            <p class="text-muted">Escribinos y te responderemos a la brevedad.</p>

            @if (session('status'))
                <div class="alert alert-success mt-3">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required />
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required />
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-iesi">Enviar mensaje</button>
            </form>
        </div>
    </section>
@endsection
