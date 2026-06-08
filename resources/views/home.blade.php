@extends('layouts.portal')

@section('title', 'La Barca de la Fe — Un viaje entre lo divino y lo ancestral')
@section('meta_description', 'Descubre La Barca de la Fe, un templo único con forma de carabela en Tlaxco, Tlaxcala. Arquitectura singular que fusiona catolicismo y simbología prehispánica.')

@section('content')

{{-- ==================== HERO SECTION ==================== --}}
<section class="hero" id="hero">
    <div class="hero-bg" style="background-image: url('{{ asset('imagenes/fondo-hero.jpg') }}'); background-color: #1a365d;"></div>
    <div class="hero-content">
        <span class="hero-subtitle">San Andrés Buenavista · Tlaxco, Tlaxcala</span>
        <h1>La Barca de la Fe</h1>
        <p class="hero-description">Un viaje entre lo divino y lo ancestral — Templo único con forma de carabela que fusiona catolicismo y simbología prehispánica</p>
        <div class="hero-cta">
            <a href="{{ route('temple') }}" class="btn btn-secondary">⛵ Descubre el Templo</a>
            <a href="{{ route('gallery') }}" class="btn btn-outline">📸 Ver Galería</a>
        </div>
    </div>
    <a href="#about" class="hero-scroll" aria-label="Scroll abajo">▼</a>
</section>

{{-- Wave Divider --}}
<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

{{-- ==================== ABOUT SECTION ==================== --}}
<section class="section" id="about">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Conoce nuestra historia</span>
            <h2>Un Templo Único en el Mundo</h2>
        </div>

        <div class="grid grid-2" style="align-items: center;">
            <div class="reveal">
                <div style="aspect-ratio: 4/3; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-lg);">
                    <img src="{{ asset('images/temple-placeholder.jpg') }}" alt="La Barca de la Fe"
                         style="width: 100%; height: 100%; object-fit: cover; background-color: #2a4a7f;">
                </div>
            </div>
            <div class="reveal">
                <h3 style="margin-bottom: var(--space-lg);">La Carabela de la Fe</h3>
                <p style="color: var(--text-secondary); margin-bottom: var(--space-lg);">
                    Inspirada en la carabela Santa María, esta extraordinaria obra fue concebida por el
                    presbítero, arquitecto y artista <strong>Arnulfo Mejía Rojas</strong>. Con aproximadamente
                    90 metros de largo y 28 de alto, es una de las construcciones más singulares de México.
                </p>
                <p style="color: var(--text-secondary); margin-bottom: var(--space-xl);">
                    Su arquitectura fusiona elementos del catolicismo con rica simbología prehispánica: glifos otomíes,
                    representaciones de Quetzalcóatl y Ometéotl, mástiles, cuerdas y espejos de agua que simulan el mar.
                </p>
                <a href="{{ route('temple') }}" class="btn btn-primary">Conocer más →</a>
            </div>
        </div>
    </div>
</section>

{{-- ==================== FEATURES (on dark bg) ==================== --}}
<div class="wave-divider flip">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#0f1b2d" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<section class="section section-dark">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Lo que te espera</span>
            <h2>Una Experiencia Única</h2>
        </div>

        <div class="grid grid-4 reveal">
            <div class="feature-card">
                <span class="feature-icon">⛪</span>
                <h3>Arquitectura Única</h3>
                <p>Templo con forma de carabela, único en Latinoamérica</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🏛️</span>
                <h3>Sincretismo Cultural</h3>
                <p>Fusión de catolicismo con simbología prehispánica otomí y tlaxcalteca</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🏛️</span>
                <h3>Museo</h3>
                <p>Dedicado a la vida y obra del padre Arnulfo Mejía Rojas</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🌄</span>
                <h3>Pueblo Mágico</h3>
                <p>En Tlaxco: quesos artesanales, haciendas y naturaleza</p>
            </div>
        </div>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

{{-- ==================== GALLERY PREVIEW ==================== --}}
<section class="section" id="gallery-preview">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Imágenes del templo</span>
            <h2>Galería</h2>
        </div>

        @if($featuredImages->count())
            <div class="gallery-grid reveal">
                @foreach($featuredImages as $image)
                    <div class="gallery-item" data-lightbox="{{ asset('storage/' . $image->image_path) }}" data-caption="{{ $image->title }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" loading="lazy">
                        <div class="gallery-overlay">
                            <div>
                                <h4>{{ $image->title }}</h4>
                                @if($image->description)
                                    <p>{{ $image->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Placeholder gallery when no images exist --}}
            <div class="gallery-grid reveal">
                @foreach(['Fachada Principal', 'Interior del Templo', 'Detalles Prehispánicos', 'Vista Aérea', 'El Timón', 'Museo'] as $title)
                    <div class="gallery-item">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #1a365d, #2a4a7f); display: flex; align-items: center; justify-content: center; color: var(--secondary); font-size: 0.9rem; text-align: center; padding: 1rem;">
                            📸 {{ $title }}
                        </div>
                        <div class="gallery-overlay" style="opacity: 1;">
                            <div>
                                <h4>{{ $title }}</h4>
                                <p>Imagen próximamente</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div style="text-align: center; margin-top: var(--space-2xl);" class="reveal">
            <a href="{{ route('gallery') }}" class="btn btn-primary">Ver galería completa →</a>
        </div>
    </div>
</section>

{{-- ==================== BLOG RECENT ==================== --}}
<section class="section section-alt" id="blog-preview">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Últimas publicaciones</span>
            <h2>Nuestro Blog</h2>
        </div>

        @if($recentPosts->count())
            <div class="grid grid-3 reveal">
                @foreach($recentPosts as $post)
                    <article class="card">
                        <div class="card-image">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #1a365d, #c6923a); display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                    ✏️
                                </div>
                            @endif
                            @if($post->category)
                                <span class="card-badge">{{ $post->category->name }}</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p>{{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}</p>
                            <div class="card-meta">
                                <span>📅 {{ $post->formatted_date }}</span>
                                <span>✍️ {{ $post->user->name }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="reveal" style="text-align: center; padding: var(--space-3xl); color: var(--text-muted);">
                <p style="font-size: 2rem; margin-bottom: var(--space-md);">✏️</p>
                <p>Pronto publicaremos contenido interesante. ¡Mantente atento!</p>
            </div>
        @endif

        <div style="text-align: center; margin-top: var(--space-2xl);" class="reveal">
            <a href="{{ route('blog.index') }}" class="btn btn-primary">Ver todas las entradas →</a>
        </div>
    </div>
</section>

{{-- ==================== HOW TO GET THERE ==================== --}}
<section class="section" id="location">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Planea tu visita</span>
            <h2>Cómo Llegar</h2>
        </div>

        <div class="grid grid-2 reveal" style="align-items: start;">
            <div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4615.997609092949!2d-98.27583592406307!3d19.568631436321322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d0252cd7de7a23%3A0x7f9ef63ea6e4070a!2sBarca%20de%20la%20Fe(EL%20BARCO)!5e1!3m2!1ses-419!2smx!4v1780961374205!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div>
                <div style="background: var(--bg-card); border-radius: var(--border-radius); padding: var(--space-2xl); box-shadow: var(--shadow-sm); margin-bottom: var(--space-xl);">
                    <h4 style="margin-bottom: var(--space-lg); color: var(--primary);">📍 Ubicación</h4>
                    <p style="color: var(--text-secondary); margin-bottom: var(--space-md);">
                        Calle V Centenario, José María Morelos Buenavista,
                        Tlaxco, Tlaxcala, México.
                    </p>
                    <p style="color: var(--text-secondary);">
                        A ~27 km de la cabecera municipal de Tlaxco.
                    </p>
                </div>

                <div style="background: var(--bg-card); border-radius: var(--border-radius); padding: var(--space-2xl); box-shadow: var(--shadow-sm); margin-bottom: var(--space-xl);">
                    <h4 style="margin-bottom: var(--space-lg); color: var(--primary);">🚗 Rutas</h4>
                    <p style="color: var(--text-secondary); margin-bottom: var(--space-sm);">
                        <strong>Desde Tlaxco:</strong> Carretera rumbo a Chignahuapan (~30 min)
                    </p>
                    <p style="color: var(--text-secondary);">
                        <strong>Desde Puebla:</strong> Autopista a Tlaxcala → Tlaxco (~2.5 hrs)
                    </p>
                </div>

                <div style="background: var(--bg-card); border-radius: var(--border-radius); padding: var(--space-2xl); box-shadow: var(--shadow-sm);">
                    <h4 style="margin-bottom: var(--space-lg); color: var(--primary);">💡 Tips de Viaje</h4>
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">
                        🌡️ Clima semi-frío (2,500 msnm) — lleva ropa abrigadora<br>
                        🗺️ Verifica la ruta, zona rural<br>
                        ⛪ Misas dominicales, respeta las ceremonias<br>
                        🧀 Aprovecha para visitar Tlaxco: Pueblo Mágico
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== TLAXCO PUEBLO MÁGICO ==================== --}}
<div class="wave-divider flip">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#f0e8d9" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<section class="section section-alt" id="pueblo-magico">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Más por descubrir</span>
            <h2>Tlaxco — Pueblo Mágico ✨</h2>
        </div>

        <div class="pueblo-grid reveal">
            <div class="pueblo-item">
                <span class="pueblo-icon">🧀</span>
                <h4>Quesos Artesanales</h4>
                <p>Panela, manchego, requesón y variedades botaneras con chile habanero</p>
            </div>
            <div class="pueblo-item">
                <span class="pueblo-icon">🏰</span>
                <h4>Haciendas Pulqueras</h4>
                <p>Tepetzala, Xochuca y San Buenaventura — historia viva del campo</p>
            </div>
            <div class="pueblo-item">
                <span class="pueblo-icon">🌲</span>
                <h4>Sierra de Tlaxco</h4>
                <p>Senderismo, camping y paisajes boscosos espectaculares</p>
            </div>
            <div class="pueblo-item">
                <span class="pueblo-icon">🍖</span>
                <h4>Gastronomía</h4>
                <p>Barbacoa de hoyo, pulque natural, tlaxcales y pan relleno de queso</p>
            </div>
        </div>
    </div>
</section>

@endsection
