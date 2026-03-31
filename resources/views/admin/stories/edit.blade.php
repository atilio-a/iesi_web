@extends('layouts.admin')

@section('title', 'Editar historia | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <h1 class="h5 font-heading mb-3">Editar historia</h1>
        @if (session('status'))
            <div class="alert alert-success py-2">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.stories.update', $story) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.stories._form', ['story' => $story])
        </form>
    </div>
@endsection
