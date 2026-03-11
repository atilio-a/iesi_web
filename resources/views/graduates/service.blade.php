@extends('layouts.app')

@section('title', $service->name . ' | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <span class="badge-iesi">Servicio turístico</span>
            <h1 class="display-6 font-heading mt-3">{{ $service->name }}</h1>
            <p class="text-muted">{{ $service->description }}</p>
            <p class="text-muted small">{{ $service->region }}</p>

            @if (! empty($service->images))
                <div class="row g-3 mt-2">
                    @foreach ($service->images as $image)
                        <div class="col-md-4">
                            <img src="{{ $image }}" alt="{{ $service->name }}" class="w-100 rounded-3" style="height: 160px; object-fit: cover;" loading="lazy" />
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="iesi-card p-3 mt-3">
                <strong>Contacto:</strong> {{ $service->contact_info['email'] ?? 'contacto@iesi.edu.ar' }}
            </div>
        </div>
    </section>
@endsection
