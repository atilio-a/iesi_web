@extends('layouts.admin')

@section('title', 'Productos | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 font-heading mb-0">Productos artesanales</h1>
            <a href="#" class="btn btn-iesi btn-sm">Nuevo producto</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Egresado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td>{{ optional($product->graduate)->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
