@extends('layouts.app')

@section('title', 'Inicio | ' . config('app.name'))
@section('content')
    <section class="iesi-section pt-4">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="badge-iesi">Instituto Intercultural de Jujuy</span>
                    <h1 class="display-5 font-heading mt-3">Formación superior con identidad cultural y comunidad</h1>
                    <p class="lead text-muted">
                        El IESI Jujuy promueve la educación intercultural que fortalece los saberes de los pueblos originarios, el territorio y el compromiso social.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('institution') }}" class="btn btn-iesi">Conocer el instituto</a>
                        <a href="{{ route('careers') }}" class="btn btn-iesi-outline">Ver carreras</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="iesi-card overflow-hidden">
                        <img src="{{ asset('images/iesi4.png') }}" alt="Comunidades indígenas jujuy" class="w-100" style="height: 360px; object-fit: cover;" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <section class="iesi-section">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="h3 font-heading">Institución con identidad</h2>
                    <p class="text-muted">
                        Formamos profesionales comprometidos con la interculturalidad, el territorio y la participación comunitaria de los pueblos originarios de Jujuy.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="iesi-card p-3 text-center">
                                <div class="h4 font-heading mb-1">4</div>
                                <div class="small text-muted">Carreras activas</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="iesi-card p-3 text-center">
                                <div class="h4 font-heading mb-1">12</div>
                                <div class="small text-muted">Comunidades vinculadas</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="iesi-card p-3 text-center">
                                <div class="h4 font-heading mb-1">25</div>
                                <div class="small text-muted">Docentes interculturales</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="iesi-card p-3 text-center">
                                <div class="h4 font-heading mb-1">200+</div>
                                <div class="small text-muted">Egresados</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="h3 font-heading mb-2">Carreras con enfoque intercultural</h2>
                    <p class="text-muted mb-0">Programas que articulan identidad cultural, territorio y comunidad.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('careers') }}" class="btn btn-iesi-outline">Ver todas</a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($careers as $career)
                    <div class="col-md-6">
                        <x-career-card :career="$career" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="iesi-section" style="background: rgba(245, 230, 163, 0.35);">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="h3 font-heading mb-2">Historias interculturales</h2>
                    <p class="text-muted mb-0">Relatos de docentes, egresados y comunidades indígenas.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('stories.index') }}" class="btn btn-iesi-outline">Ver historias</a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($featuredStories as $story)
                    <div class="col-md-4">
                        <x-story-card :story="$story" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="h3 font-heading mb-2">Noticias destacadas</h2>
                    <p class="text-muted mb-0">Actualidad institucional y comunitaria.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('news.index') }}" class="btn btn-iesi-outline">Ver noticias</a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($featuredNews as $news)
                    <div class="col-md-4">
                        <x-news-card :news="$news" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="iesi-section" style="background: rgba(175, 200, 230, 0.35);">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="h3 font-heading">Egresados y emprendimientos</h2>
                    <p class="text-muted">Conectá con productos artesanales y experiencias turísticas creadas por egresados y comunidades.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('graduates.index') }}" class="btn btn-iesi">Explorar egresados</a>
                        <a href="{{ route('graduates.index') }}" class="btn btn-iesi-outline">Ver servicios</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="iesi-card p-4">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="iesi-card p-3 h-100">
                                    <h3 class="h6 font-heading mb-2">Productos artesanales</h3>
                                    <p class="small text-muted mb-0">Textiles, cerámica y artesanías con identidad.</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="iesi-card p-3 h-100">
                                    <h3 class="h6 font-heading mb-2">Servicios turísticos</h3>
                                    <p class="small text-muted mb-0">Experiencias territoriales guiadas por comunidades.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="iesi-section">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="h3 font-heading mb-2">Biblioteca virtual</h2>
                    <p class="text-muted mb-0">Documentos, videos y recursos externos para la comunidad.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('library.index') }}" class="btn btn-iesi-outline">Ver biblioteca</a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($libraryHighlights as $item)
                    <div class="col-md-4">
                        <x-library-card :item="$item" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="iesi-section text-center" style="background: rgba(212, 184, 230, 0.35);">
        <div class="container">
            <h2 class="h3 font-heading mb-2">Accede al Campus Virtual</h2>
            <p class="text-muted">Ingresá al entorno Moodle para continuar con tu formación.</p>
            <a href="{{ config('services.iesi.virtual_campus_url') }}" class="btn btn-iesi mt-2" target="_blank" rel="noopener">Ir al Campus</a>
        </div>
    </section>
@endsection
