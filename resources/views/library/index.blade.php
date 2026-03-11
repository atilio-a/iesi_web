@extends('layouts.app')

@section('title', 'Biblioteca Virtual | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-md-8">
                    <h1 class="display-6 font-heading">Biblioteca virtual</h1>
                    <p class="text-muted">Documentos, videos y recursos externos.</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($items as $item)
                    <div class="col-md-4">
                        <x-library-card :item="$item" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
