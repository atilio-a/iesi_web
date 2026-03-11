@extends('layouts.admin')

@section('title', 'Egresados | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Egresados</h1>
            <a href="#" class="btn btn-iesi btn-sm">Nuevo egresado</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Comunidad</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($graduates as $graduate)
                        <tr>
                            <td class="fw-semibold">{{ $graduate->name }}</td>
                            <td>{{ $graduate->community }}</td>
                            <td>{{ optional($graduate->user)->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
