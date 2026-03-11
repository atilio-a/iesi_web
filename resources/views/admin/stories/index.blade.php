@extends('layouts.admin')

@section('title', 'Historias | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Historias</h1>
            <a href="#" class="btn btn-iesi btn-sm">Nueva historia</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stories as $story)
                        <tr>
                            <td class="fw-semibold">{{ $story->title }}</td>
                            <td>{{ ucfirst($story->type) }}</td>
                            <td>{{ optional($story->published_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
