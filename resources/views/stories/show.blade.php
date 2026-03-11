@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $story->title . ' | ' . config('app.name'))
@section('meta_description', Str::limit(strip_tags($story->content), 160))
@section('og_title', $story->title)
@section('og_description', Str::limit(strip_tags($story->content), 160))
@section('og_image', $story->featured_image ?? asset('images/og-default.svg'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <span class="badge-iesi text-uppercase">{{ ucfirst($story->type) }}</span>
            <h1 class="display-6 font-heading mt-3">{{ $story->title }}</h1>
            <div class="text-muted small">
                {{ optional($story->author)->name ?? 'Equipo IESI' }} · {{ optional($story->published_at)->format('d/m/Y') }}
            </div>
            <img src="{{ $story->featured_image ?? 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80' }}" alt="{{ $story->title }}" class="w-100 mt-4 rounded-4" style="height: 360px; object-fit: cover;" loading="lazy" />
            <article class="mt-4 text-muted">
                {!! nl2br(e($story->content)) !!}
            </article>

            @if ($story->video_url)
                <div class="mt-4">
                    <h3 class="h5 font-heading">Testimonio en video</h3>
                    <div class="ratio ratio-16x9 mt-2">
                        <iframe src="{{ $story->video_url }}" title="Video testimonial" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            @endif

            @if (! empty($story->gallery))
                <div class="mt-8">
                    <h3 class="h5 font-heading">Galería</h3>
                    <div class="row g-3 mt-2">
                        @foreach ($story->gallery as $image)
                            <div class="col-md-4">
                                <img src="{{ $image }}" alt="Imagen de historia" class="w-100 rounded-3" style="height: 160px; object-fit: cover;" loading="lazy" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($relatedStories->isNotEmpty())
                <div class="mt-10">
                    <h3 class="h5 font-heading">Historias relacionadas</h3>
                    <div class="row g-3 mt-2">
                        @foreach ($relatedStories as $related)
                            <div class="col-md-6">
                                <a href="{{ route('stories.show', $related->slug) }}" class="iesi-card p-4 text-decoration-none d-block">
                                    <span class="badge-iesi text-uppercase">{{ ucfirst($related->type) }}</span>
                                    <h4 class="h6 font-heading mt-2 text-dark">{{ $related->title }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
