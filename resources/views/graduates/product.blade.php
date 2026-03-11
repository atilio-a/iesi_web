@extends('layouts.app')

@section('title', $product->name . ' | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <span class="badge-iesi">Producto artesanal</span>
            <h1 class="display-6 font-heading mt-3">{{ $product->name }}</h1>
            <p class="text-muted">{{ $product->description }}</p>

            @if (! empty($product->images))
                <div class="row g-3 mt-2">
                    @foreach ($product->images as $image)
                        <div class="col-md-4">
                            <img src="{{ $image }}" alt="{{ $product->name }}" class="w-100 rounded-3" style="height: 160px; object-fit: cover;" loading="lazy" />
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="iesi-card p-3 mt-3">
                <strong>Contacto:</strong> {{ $product->contact_info['email'] ?? 'contacto@iesi.edu.ar' }}
            </div>
        </div>
    </section>
@endsection
