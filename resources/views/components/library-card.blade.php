@props(['item'])

@php
    $isFile = $item->type === 'file';
    $isExternal = $item->type === 'external';
@endphp

<div class="iesi-card h-100 position-relative fade-in-up">
    <div class="p-4">
        <div class="d-flex align-items-center gap-2">
            <span class="icon-pill">
                @if ($isFile)
                    PDF
                @elseif ($isExternal)
                    Link
                @else
                    Video
                @endif
            </span>
            <span class="small text-muted">{{ $item->category ?? 'Recurso' }}</span>
        </div>
        <h3 class="h5 font-heading mt-3">{{ $item->title }}</h3>
        <p class="small text-muted">{{ $item->description }}</p>
        @if ($isFile && $item->file_path)
            <a href="{{ asset('storage/' . $item->file_path) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
                Descargar
            </a>
        @elseif ($item->external_url)
            <a href="{{ $item->external_url }}" target="_blank" rel="noopener" class="stretched-link text-decoration-none fw-semibold text-dark">
                Ver recurso
            </a>
        @endif
    </div>
</div>
