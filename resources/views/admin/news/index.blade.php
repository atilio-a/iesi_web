@extends('layouts.admin')

@section('title', 'Noticias | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Noticias</h1>
            <a href="{{ route('admin.news.create') }}" class="btn btn-iesi btn-sm">Nueva noticia</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td class="fw-semibold">{{ $item->title }}</td>
                            <td>{{ optional($item->category)->name }}</td>
                            <td>{{ optional($item->published_at)->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-iesi-outline">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
