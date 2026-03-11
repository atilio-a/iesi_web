@props(['product'])

@php
    $image = $product->images[0] ?? 'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=600&q=80';
@endphp

<div class="iesi-card h-100 position-relative fade-in-up">
    <img src="{{ $image }}" alt="{{ $product->name }}" class="w-100 rounded-top-4" style="height: 200px; object-fit: cover;" loading="lazy">
    <div class="p-4">
        <span class="badge-iesi">Artesanía</span>
        <h3 class="h5 font-heading mt-2">{{ $product->name }}</h3>
        <p class="small text-muted">{{ $product->description }}</p>
        <a href="{{ route('graduates.products.show', [$product->graduate_id, $product->id]) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
            Ver producto
        </a>
    </div>
</div>
