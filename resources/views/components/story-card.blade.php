@props(['story'])

@php
    use Illuminate\Support\Str;
    $image = $story->featured_image_url ?? 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80';
@endphp

<div class="iesi-card h-100 position-relative fade-in-up">
    <img src="{{ $image }}" alt="{{ $story->title }}" class="w-100 rounded-top-4" style="height: 200px; object-fit: cover;" loading="lazy">
    <div class="p-4">
        <span class="badge-iesi text-uppercase">{{ ucfirst($story->type) }}</span>
        <h3 class="h5 font-heading mt-2">{{ $story->title }}</h3>
        <p class="small text-muted">{{ Str::limit(strip_tags($story->content), 120) }}</p>
        <a href="{{ route('stories.show', $story->slug) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
            Leer historia
        </a>
    </div>
</div>
