@extends('layouts.admin')

@section('title', 'Servicios turísticos | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Servicios turísticos</h1>
            <a href="#" class="btn btn-iesi btn-sm">Nuevo servicio</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Región</th>
                        <th>Egresado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td class="fw-semibold">{{ $service->name }}</td>
                            <td>{{ $service->region }}</td>
                            <td>{{ optional($service->graduate)->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
