@extends('layouts.app')

@section('title', 'Carreras | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-md-8">
                    <h1 class="display-6 font-heading">Carreras</h1>
                    <p class="text-muted">Formación superior con enfoque intercultural.</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($careers as $career)
                    <div class="col-md-4">
                        <x-career-card :career="$career" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
