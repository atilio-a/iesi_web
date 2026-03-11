@extends('layouts.admin')

@section('title', 'Mis servicios | Panel Egresados')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Mis servicios turísticos</h1>
            <a href="#" class="btn btn-iesi btn-sm">Nuevo servicio</a>
        </div>
        <div class="row g-3">
            @foreach ($services as $service)
                <div class="col-md-6">
                    <div class="iesi-card p-3">
                        <h3 class="h6 font-heading">{{ $service->name }}</h3>
                        <p class="small text-muted mb-1">{{ $service->description }}</p>
                        <p class="small text-muted mb-0">{{ $service->region }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
