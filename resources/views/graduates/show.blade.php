@extends('layouts.app')

@section('title', $graduate->name . ' | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-4 text-center">
                    <img src="{{ $graduate->photo ?? 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $graduate->name }}" class="rounded-4" style="width: 260px; height: 260px; object-fit: cover;" loading="lazy">
                </div>
                <div class="col-md-8">
                    <span class="badge-iesi">{{ $graduate->community }}</span>
                    <h1 class="display-6 font-heading mt-2">{{ $graduate->name }}</h1>
                    <p class="text-muted">{{ $graduate->biography }}</p>
                    <a href="mailto:{{ $graduate->contact_info['email'] ?? 'contacto@iesi.edu.ar' }}" class="btn btn-iesi">
                        Contactar
                    </a>
                </div>
            </div>

            <div class="mt-5">
                <h2 class="h4 font-heading">Productos artesanales</h2>
                <div class="row g-4 mt-1">
                    @foreach ($graduate->products as $product)
                        <div class="col-md-6">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5">
                <h2 class="h4 font-heading">Servicios turísticos</h2>
                <div class="row g-4 mt-1">
                    @foreach ($graduate->tourismServices as $service)
                        <div class="col-md-6">
                            <x-service-card :service="$service" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
