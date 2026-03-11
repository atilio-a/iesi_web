@props(['career'])

<div class="iesi-card h-100 position-relative fade-in-up">
    <div class="p-4">
        <span class="icon-pill">Carrera</span>
        <h3 class="h5 font-heading mt-2">{{ $career['name'] }}</h3>
        <p class="small text-muted">{{ $career['summary'] }}</p>
        <a href="{{ route('careers.show', $career['slug']) }}" class="stretched-link text-decoration-none fw-semibold text-dark">
            Ver detalle
        </a>
    </div>
</div>
