@extends('layouts.admin')

@section('title', 'Crear historia | Panel CMS')
@section('content')
    <div class="iesi-card p-4">
        <h1 class="h5 font-heading mb-3">Nueva historia</h1>
        <form method="POST" action="{{ route('admin.stories.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.stories._form', ['story' => null])
        </form>
    </div>
@endsection
