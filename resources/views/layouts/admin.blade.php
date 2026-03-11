<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Panel CMS | ' . config('app.name'))</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="iesi-navbar py-3">
            <div class="container d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none fw-semibold text-dark">Panel CMS</a>
                <div class="d-flex align-items-center gap-3 small">
                    <span class="text-muted">{{ auth()->user()->name ?? 'Usuario' }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-iesi btn btn-sm">Salir</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="container py-4">
            <div class="row g-4">
                <aside class="col-12 col-lg-3">
                    <div class="iesi-card p-3">
                        @php($role = auth()->user()?->role?->slug)
                        <nav class="d-grid gap-2">
                            @if (in_array($role, ['administrator', 'editor'], true))
                                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark">Resumen</a>
                                <a href="{{ route('admin.news.index') }}" class="text-decoration-none text-dark">Noticias</a>
                                <a href="{{ route('admin.stories.index') }}" class="text-decoration-none text-dark">Historias</a>
                                <a href="{{ route('admin.library.index') }}" class="text-decoration-none text-dark">Biblioteca</a>
                                <a href="{{ route('admin.graduates.index') }}" class="text-decoration-none text-dark">Egresados</a>
                                <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-dark">Productos</a>
                                <a href="{{ route('admin.tourism-services.index') }}" class="text-decoration-none text-dark">Servicios turísticos</a>
                                <a href="{{ route('admin.users.index') }}" class="text-decoration-none text-dark">Usuarios</a>
                            @elseif ($role === 'graduate')
                                <a href="{{ route('graduate.dashboard') }}" class="text-decoration-none text-dark">Mi perfil</a>
                                <a href="{{ route('graduate.products') }}" class="text-decoration-none text-dark">Mis productos</a>
                                <a href="{{ route('graduate.services') }}" class="text-decoration-none text-dark">Mis servicios</a>
                            @endif
                        </nav>
                    </div>
                </aside>

                <main class="col-12 col-lg-9">
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
