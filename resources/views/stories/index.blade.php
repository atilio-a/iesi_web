@extends('layouts.app')

@section('title', 'Historias | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-md-8">
                    <h1 class="display-6 font-heading">Historias interculturales</h1>
                    <p class="text-muted">Relatos de docentes, egresados y comunidades indígenas.</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($stories as $story)
                    <div class="col-md-4">
                        <x-story-card :story="$story" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
