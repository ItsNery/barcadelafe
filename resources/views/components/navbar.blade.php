{{-- Navbar Component --}}
<nav class="navbar" id="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <span class="brand-icon">⛵</span>
            <span>La Barca de la Fe</span>
        </a>

        <ul class="navbar-menu" id="navbar-menu">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a></li>
            <li><a href="{{ route('temple') }}" class="{{ request()->routeIs('temple') ? 'active' : '' }}">El Templo</a></li>
            <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galería</a></li>
            <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contacto</a></li>
        </ul>

        <button class="navbar-toggle" id="navbar-toggle" aria-label="Menú">
            ☰
        </button>
    </div>
</nav>
