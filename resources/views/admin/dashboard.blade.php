@extends('layouts.admin')

@section('title', 'Panel CMS | ' . config('app.name'))
@section('content')
    <div class="iesi-card p-4">
        <h1 class="h4 font-heading mb-2">Resumen institucional</h1>
        <p class="text-muted mb-4">Accesos rápidos para gestionar contenidos.</p>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: rgba(245, 230, 163, 0.35);">Noticias: {{ $metrics['news'] }}</div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: rgba(175, 200, 230, 0.35);">Historias: {{ $metrics['stories'] }}</div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: rgba(184, 224, 194, 0.35);">Egresados: {{ $metrics['graduates'] }}</div>
            </div>
        </div>
    </div>
@endsection
