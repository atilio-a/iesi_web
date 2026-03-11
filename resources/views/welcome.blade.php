@extends('layouts.app')

@section('title', 'Bienvenida | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container text-center">
            <h1 class="display-6 font-heading">Bienvenida</h1>
            <p class="text-muted">Explorá la plataforma intercultural del IESI Jujuy.</p>
            <a href="{{ route('home') }}" class="btn btn-iesi mt-2">Ir al inicio</a>
        </div>
    </section>
@endsection
