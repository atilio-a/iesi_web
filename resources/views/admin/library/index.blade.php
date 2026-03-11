@extends('layouts.admin')

@section('title', 'Biblioteca | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Biblioteca</h1>
            <a href="#" class="btn btn-iesi btn-sm">Nuevo recurso</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="fw-semibold">{{ $item->title }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->category }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
