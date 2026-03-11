@extends('layouts.app')

@section('title', 'Egresados | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-md-8">
                    <h1 class="display-6 font-heading">Egresados</h1>
                    <p class="text-muted">Perfiles, productos artesanales y servicios turísticos.</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($graduates as $graduate)
                    <div class="col-md-4">
                        <div class="iesi-card h-100 position-relative fade-in-up">
                            <img src="{{ $graduate->photo ?? 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $graduate->name }}" class="w-100 rounded-top-4" style="height: 200px; object-fit: cover;" loading="lazy">
                            <div class="p-4">
                                <span class="badge-iesi">{{ $graduate->community }}</span>
                                <h3 class="h5 font-heading mt-2">{{ $graduate->name }}</h3>
                                <a href="{{ route('graduates.show', $graduate->id) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
                                    Ver perfil
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
