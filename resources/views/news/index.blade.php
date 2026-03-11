@extends('layouts.app')

@section('title', 'Noticias | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-md-8">
                    <h1 class="display-6 font-heading">Noticias</h1>
                    <p class="text-muted">Actualidad institucional y comunitaria.</p>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route('news.index') }}" class="badge-iesi text-decoration-none">Todas</a>
                @foreach ($categories as $category)
                    <a href="{{ route('news.index', ['category' => $category->slug]) }}" class="badge-iesi text-decoration-none">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="row g-4">
                @foreach ($news as $item)
                    <div class="col-md-4">
                        <x-news-card :news="$item" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
