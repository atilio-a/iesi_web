@props(['news' => null, 'categories', 'tags'])

@php
    $isEdit = (bool) $news;
@endphp

<div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}" required>
    @error('title')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $news->slug ?? '') }}" placeholder="se-generara-automaticamente-si-lo-dejas-vacio">
    @error('slug')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Categoría</label>
    <select name="news_category_id" class="form-select">
        <option value="">Sin categoría</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('news_category_id', $news->news_category_id ?? null) == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('news_category_id')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Etiquetas</label>
    <select name="tags[]" class="form-select" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                @if ($isEdit && $news->tags->pluck('id')->contains($tag->id)) selected @endif>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
    @error('tags')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Imagen destacada (JPG o PNG)</label>
    <div class="mb-2">
        <img
            id="news-featured-preview"
            src="{{ $isEdit && $news->featured_image_url ? $news->featured_image_url : '' }}"
            alt="Vista previa"
            class="{{ $isEdit && $news->featured_image_url ? '' : 'd-none' }}"
            style="height: 80px; border-radius: 0.5rem; object-fit: cover;"
        >
    </div>
    <input type="file" name="featured_image" class="form-control" accept="image/jpeg,image/png">
    @error('featured_image')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
    <div class="form-text">Peso máximo recomendado: 2MB.</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector('input[name="featured_image"]');
        const preview = document.getElementById('news-featured-preview');
        if (!input || !preview) return;
        input.addEventListener('change', function (event) {
            const file = event.target.files?.[0];
            if (!file) return;
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        });
    });
</script>

<div class="mb-3">
    <label class="form-label">Video (URL opcional)</label>
    <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $news->video_url ?? '') }}">
    @error('video_url')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Contenido</label>
    <textarea name="content" rows="8" class="form-control" required>{{ old('content', $news->content ?? '') }}</textarea>
    @error('content')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="row g-3 mb-3">
    <div class="col-md-4">
        <div class="form-check mt-2">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                @checked(old('is_featured', $news->is_featured ?? false))>
            <label for="is_featured" class="form-check-label">Destacada</label>
        </div>
    </div>
    <div class="col-md-8">
        <label class="form-label">Fecha de publicación</label>
        <input type="datetime-local" name="published_at" class="form-control"
            value="{{ old('published_at', optional($news->published_at ?? null)->format('Y-m-d\TH:i')) }}">
        @error('published_at')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="text-end">
    <button type="submit" class="btn btn-iesi">
        {{ $isEdit ? 'Actualizar' : 'Crear' }} noticia
    </button>
</div>
