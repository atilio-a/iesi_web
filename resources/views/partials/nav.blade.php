<nav class="navbar navbar-expand-lg navbar-light iesi-navbar py-3">
    <div class="container">
        <a class="navbar-brand fw-semibold text-dark" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#iesiNavbar" aria-controls="iesiNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="iesiNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('institution') }}">Institución</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('careers') }}">Carreras</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('stories.index') }}">Historias</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('news.index') }}">Noticias</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('library.index') }}">Biblioteca</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('graduates.index') }}">Egresados</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('contact') }}">Contacto</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ config('services.iesi.virtual_campus_url') }}" target="_blank" rel="noopener">Campus virtual</a></li>
            </ul>
            <div class="d-flex ms-lg-3">
                <a href="{{ config('services.iesi.virtual_campus_url') }}" class="btn btn-iesi" target="_blank" rel="noopener">
                    Campus virtual
                </a>
            </div>
        </div>
    </div>
</nav>
