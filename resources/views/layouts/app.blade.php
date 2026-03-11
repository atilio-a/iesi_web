<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="@yield('meta_description', 'Instituto de Educación Superior Intercultural de Jujuy. Formación con identidad, territorio y comunidad.')" />
        <meta property="og:title" content="@yield('og_title', config('app.name'))" />
        <meta property="og:description" content="@yield('og_description', 'Formación superior intercultural en Jujuy.')" />
        <meta property="og:image" content="@yield('og_image', asset('images/og-default.svg'))" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <link rel="canonical" href="{{ url()->current() }}" />

        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'CollegeOrUniversity',
                'name' => config('app.name'),
                'url' => config('app.url'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'San Salvador de Jujuy',
                    'addressRegion' => 'Jujuy',
                    'addressCountry' => 'AR',
                ],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('partials.nav')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
