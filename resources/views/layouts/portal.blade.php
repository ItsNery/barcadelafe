<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'La Barca de la Fe — Tlaxco, Tlaxcala')</title>
    <meta name="description" content="@yield('meta_description', 'La Barca de la Fe: un templo único con forma de carabela en Tlaxco, Tlaxcala. Descubre su historia, simbología prehispánica y arquitectura singular.')">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>⛵</text></svg>">

    @vite(['resources/css/portal.css', 'resources/js/portal.js'])

    @stack('styles')
</head>
<body>
    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Lightbox --}}
    <div id="lightbox" class="lightbox">
        <button class="lightbox-close" aria-label="Cerrar">✕</button>
        <button class="lightbox-nav lightbox-prev" aria-label="Anterior">‹</button>
        <button class="lightbox-nav lightbox-next" aria-label="Siguiente">›</button>
        <img class="lightbox-image" src="" alt="Imagen ampliada">
        <div class="lightbox-caption"></div>
    </div>

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
