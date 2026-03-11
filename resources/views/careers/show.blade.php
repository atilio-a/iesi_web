@extends('layouts.app')

@section('title', $career['name'] . ' | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <span class="badge-iesi">Carrera</span>
            <h1 class="display-6 font-heading mt-3">{{ $career['name'] }}</h1>
            <p class="text-muted">{{ $career['description'] }}</p>

            <div class="row g-3 mt-2">
                <div class="col-md-6">
                    <div class="iesi-card p-3">
                        <h3 class="h6 font-heading">Duración</h3>
                        <p class="small text-muted mb-0">{{ $career['duration'] }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iesi-card p-3">
                        <h3 class="h6 font-heading">Modalidad</h3>
                        <p class="small text-muted mb-0">{{ $career['modality'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
