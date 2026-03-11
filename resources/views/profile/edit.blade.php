@extends('layouts.admin')

@section('title', 'Perfil | ' . config('app.name'))
@section('content')
    <div class="iesi-card p-4 mb-4">
        <h1 class="h4 font-heading mb-0">Perfil</h1>
    </div>

    <div class="d-grid gap-4">
        <div class="iesi-card p-4">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="iesi-card p-4">
            @include('profile.partials.update-password-form')
        </div>

        <div class="iesi-card p-4">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
