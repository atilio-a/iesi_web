@extends('layouts.admin')

@section('title', 'Editar noticia | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <h1 class="h5 font-heading mb-3">Editar noticia</h1>
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.news._form', ['news' => $news, 'categories' => $categories, 'tags' => $tags])
        </form>
    </div>
@endsection

