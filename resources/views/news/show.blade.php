@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $news->title . ' | ' . config('app.name'))
@section('meta_description', $news->excerpt ?? Str::limit(strip_tags($news->content), 160))
@section('og_title', $news->title)
@section('og_description', $news->excerpt ?? Str::limit(strip_tags($news->content), 160))
@section('og_image', $news->featured_image_url ?? asset('images/og-default.svg'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <span class="badge-iesi">{{ optional($news->category)->name ?? 'Institucional' }}</span>
            <h1 class="display-6 font-heading mt-3">{{ $news->title }}</h1>
            <div class="text-muted small">
                {{ optional($news->author)->name ?? 'Equipo IESI' }} · {{ optional($news->published_at)->format('d/m/Y') }}
            </div>
            <img src="{{ $news->featured_image_url ?? 'https://images.unsplash.com/photo-1456406644174-8ddd4cd52a06?auto=format&fit=crop&w=900&q=80' }}" alt="{{ $news->title }}" class="w-100 mt-4 rounded-4" style="height: 360px; object-fit: cover;" loading="lazy" />
            <article class="mt-4 text-muted">
                {!! nl2br(e($news->content)) !!}
            </article>

            @if ($news->video_url)
                <div class="mt-4">
                    <h3 class="h5 font-heading">Video</h3>
                    <div class="ratio ratio-16x9 mt-2">
                        <iframe src="{{ $news->video_url }}" title="Video noticia" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            @endif

            @if (! empty($news->gallery))
                <div class="mt-8">
                    <h3 class="h5 font-heading">Galería</h3>
                    <div class="row g-3 mt-2">
                        @foreach ($news->gallery as $image)
                            <div class="col-md-4">
                                <img src="{{ $image }}" alt="Imagen de noticia" class="w-100 rounded-3" style="height: 160px; object-fit: cover;" loading="lazy" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
