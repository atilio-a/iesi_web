@extends('layouts.admin')

@section('title', 'Mi perfil | Panel Egresados')
@section('content')
    <div class="iesi-card p-4">
        <h1 class="h5 font-heading mb-2">Mi perfil</h1>
        @if ($graduate)
            <div class="text-muted">
                <p><strong>Nombre:</strong> {{ $graduate->name }}</p>
                <p><strong>Comunidad:</strong> {{ $graduate->community }}</p>
                <p class="mt-2">{{ $graduate->biography }}</p>
            </div>
        @else
            <p class="text-muted">Aún no hay un perfil asociado. Contacta al administrador.</p>
        @endif
    </div>
@endsection
