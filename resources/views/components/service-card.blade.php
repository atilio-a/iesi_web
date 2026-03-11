@props(['service'])

@php
    $image = $service->images[0] ?? 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=600&q=80';
@endphp

<div class="iesi-card h-100 position-relative fade-in-up">
    <img src="{{ $image }}" alt="{{ $service->name }}" class="w-100 rounded-top-4" style="height: 200px; object-fit: cover;" loading="lazy">
    <div class="p-4">
        <span class="badge-iesi">Turismo</span>
        <h3 class="h5 font-heading mt-2">{{ $service->name }}</h3>
        <p class="small text-muted">{{ $service->description }}</p>
        <p class="small text-muted mb-0">{{ $service->region }}</p>
        <a href="{{ route('graduates.services.show', [$service->graduate_id, $service->id]) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
            Ver servicio
        </a>
    </div>
</div>
