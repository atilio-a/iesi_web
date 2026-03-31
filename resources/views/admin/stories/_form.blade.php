@props(['story' => null])

@php
    $isEdit = (bool) $story;
@endphp

<div class="mb-3">
    <label class="form-label">Tipo</label>
    <select name="type" class="form-select" required>
        <option value="docente" @selected(old('type', $story->type ?? '') === 'docente')>Docente</option>
        <option value="egresado" @selected(old('type', $story->type ?? '') === 'egresado')>Egresado</option>
        <option value="comunidad" @selected(old('type', $story->type ?? '') === 'comunidad')>Comunidad</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $story->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $story->slug ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Imagen destacada (JPG o PNG)</label>
    @if ($isEdit && $story->featured_image)
        <div class="mb-2">
            <img src="{{ $story->featured_image }}" alt="{{ $story->title }}" style="height: 80px; border-radius: 0.5rem; object-fit: cover;">
        </div>
    @endif
    <input type="file" name="featured_image" class="form-control" accept="image/jpeg,image/png">
</div>

<div class="mb-3">
    <label class="form-label">Video URL (opcional)</label>
    <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $story->video_url ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Audio URL (opcional)</label>
    <input type="text" name="audio_url" class="form-control" value="{{ old('audio_url', $story->audio_url ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Contenido</label>
    <textarea name="content" rows="8" class="form-control" required>{{ old('content', $story->content ?? '') }}</textarea>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-4">
        <div class="form-check mt-2">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                @checked(old('is_featured', $story->is_featured ?? false))>
            <label for="is_featured" class="form-check-label">Destacada</label>
        </div>
    </div>
    <div class="col-md-8">
        <label class="form-label">Fecha de publicación</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', optional($story->published_at ?? null)->format('Y-m-d\TH:i')) }}">
    </div>
</div>

<div class="text-end">
    <button type="submit" class="btn btn-iesi">
        {{ $isEdit ? 'Actualizar' : 'Crear' }} historia
    </button>
</div>
