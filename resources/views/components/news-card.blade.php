@props(['news'])

@php
    use Illuminate\Support\Str;
    $image = $news->featured_image ?? 'https://images.unsplash.com/photo-1456406644174-8ddd4cd52a06?auto=format&fit=crop&w=900&q=80';
@endphp

<div class="iesi-card h-100 position-relative fade-in-up">
    <img src="{{ $image }}" alt="{{ $news->title }}" class="w-100 rounded-top-4" style="height: 200px; object-fit: cover;" loading="lazy">
    <div class="p-4">
        <span class="badge-iesi">{{ optional($news->category)->name ?? 'Institucional' }}</span>
        <h3 class="h5 font-heading mt-2">{{ $news->title }}</h3>
        <p class="small text-muted">{{ $news->excerpt ?? Str::limit(strip_tags($news->content), 120) }}</p>
        <a href="{{ route('news.show', $news->slug) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
            Leer noticia
        </a>
    </div>
</div>
