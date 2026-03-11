@extends('layouts.app')

@section('title', 'Institución | ' . config('app.name'))
@section('content')
    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <h1 class="display-6 font-heading">Institución</h1>
            <p class="text-muted">
                El Instituto de Educación Superior Intercultural de Jujuy surge para fortalecer la formación profesional con identidad cultural, diálogo de saberes y compromiso territorial.
            </p>
        </div>
    </section>

    <section class="iesi-section" style="background: rgba(245, 230, 163, 0.35);">
        <div class="container" style="max-width: 860px;">
            <h2 class="h3 font-heading">Origen e historia</h2>
            <p class="text-muted">
                El IESI nace desde las comunidades y organizaciones indígenas del norte argentino, con el objetivo de garantizar una educación superior pertinente, intercultural y situada.
            </p>
        </div>
    </section>

    <section class="iesi-section">
        <div class="container" style="max-width: 860px;">
            <h2 class="h3 font-heading">Filosofía intercultural</h2>
            <p class="text-muted">
                Promovemos el aprendizaje intercultural, la investigación comunitaria, la revitalización lingüística y la participación de los pueblos originarios en la toma de decisiones.
            </p>
        </div>
    </section>

    <section class="iesi-section" style="background: rgba(175, 200, 230, 0.35);">
        <div class="container" style="max-width: 860px;">
            <h2 class="h3 font-heading">Valores institucionales</h2>
            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <div class="iesi-card p-3">Interculturalidad y respeto a la diversidad.</div>
                </div>
                <div class="col-md-6">
                    <div class="iesi-card p-3">Participación comunitaria y territorial.</div>
                </div>
                <div class="col-md-6">
                    <div class="iesi-card p-3">Formación con identidad y pertinencia.</div>
                </div>
                <div class="col-md-6">
                    <div class="iesi-card p-3">Compromiso con la justicia social.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="iesi-section">
        <div class="container">
            <h2 class="h3 font-heading">Autoridades</h2>
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="iesi-card p-4">
                        <span class="badge-iesi">Rectoría</span>
                        <h3 class="h5 font-heading mt-2">Lic. Antonia Cruz</h3>
                        <p class="small text-muted">Representación institucional y coordinación general.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iesi-card p-4">
                        <span class="badge-iesi">Secretaría Académica</span>
                        <h3 class="h5 font-heading mt-2">Prof. Mateo Choque</h3>
                        <p class="small text-muted">Planificación educativa y acompañamiento docente.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iesi-card p-4">
                        <span class="badge-iesi">Secretaría Comunitaria</span>
                        <h3 class="h5 font-heading mt-2">Lic. Belén Quispe</h3>
                        <p class="small text-muted">Vínculo con comunidades y pueblos originarios.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="iesi-section" style="background: rgba(212, 184, 230, 0.35);">
        <div class="container" style="max-width: 860px;">
            <h2 class="h3 font-heading">Facebook institucional</h2>
            <div class="iesi-card p-3 mt-3">
                <div class="ratio ratio-16x9">
                    <iframe
                        title="Facebook IESI"
                        src="https://www.facebook.com/plugins/page.php?href={{ urlencode(config('services.iesi.facebook_page_url')) }}&tabs=timeline&width=500&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                        loading="lazy"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
