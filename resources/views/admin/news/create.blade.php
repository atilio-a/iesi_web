@extends('layouts.admin')

@section('title', 'Crear noticia | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <h1 class="h5 font-heading mb-3">Nueva noticia</h1>
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.news._form', ['news' => null, 'categories' => $categories, 'tags' => $tags])
        </form>
    </div>
@endsection

