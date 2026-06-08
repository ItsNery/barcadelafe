@extends('layouts.portal')

@section('title', 'El Templo — La Barca de la Fe')
@section('meta_description', 'Conoce la historia de La Barca de la Fe, un templo único en Tlaxco, Tlaxcala, con forma de carabela y simbología prehispánica.')

@section('content')

{{-- Page Hero --}}
<section class="page-hero" style="background-image: url('{{ asset('images/temple-hero.jpg') }}'); background-color: #1a365d;">
    <div class="page-hero-content">
        <span class="breadcrumb"><a href="{{ route('home') }}">Inicio</a> / El Templo</span>
        <h1>El Templo</h1>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

{{-- Main Content --}}
<section class="section">
    <div class="container-narrow">
        {{-- Introduction --}}
        <div class="reveal" style="text-align: center; margin-bottom: var(--space-4xl);">
            <span style="font-family: var(--font-decorative); color: var(--secondary); font-size: 0.9rem; letter-spacing: 3px; text-transform: uppercase;">La obra de un visionario</span>
            <h2 style="margin: var(--space-md) 0;">La Carabela de la Fe</h2>
            <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto; font-size: 1.05rem;">
                Un templo que navega entre el cielo y la tierra, fusionando la fe católica con las raíces ancestrales de Tlaxcala.
            </p>
        </div>

        <div class="post-body reveal">
            <p>La Barca de la Fe es uno de los sitios arquitectónicos más singulares del estado de Tlaxcala. Ubicado en la comunidad de San Andrés Buenavista, en el municipio de Tlaxco, este templo católico destaca por su extraordinaria estructura que replica una embarcación.</p>
            <p>Inspirado en la carabela Santa María, fue concebido por el presbítero, arquitecto y artista Arnulfo Mejía Rojas. La obra fusiona elementos del catolicismo con una rica simbología prehispánica, creando un sincretismo visual único en el mundo.</p>
        </div>

        {{-- History Section --}}
        <div class="reveal" style="margin-top: var(--space-4xl);">
            <div class="section-title">
                <span class="subtitle">Un sueño hecho realidad</span>
                <h2>Historia</h2>
            </div>

            <div class="grid grid-2" style="align-items: center; margin-top: var(--space-2xl);">
                <div>
                    <h3 style="margin-bottom: var(--space-lg);">El Padre Arnulfo Mejía Rojas</h3>
                    <p style="color: var(--text-secondary); margin-bottom: var(--space-md);">
                        Presbítero, arquitecto y artista, el padre Arnulfo concibió esta obra monumental como un
                        testimonio de fe y cultura. Su visión era crear un espacio donde convergieran la fe católica
                        y la identidad prehispánica de la región.
                    </p>
                    <p style="color: var(--text-secondary);">
                        El templo incluye un museo dedicado a su vida y obra, donde se exhiben planos originales,
                        pinturas, bocetos y objetos personales.
                    </p>
                </div>
                <div>
                    <div style="aspect-ratio: 4/3; border-radius: var(--border-radius); overflow: hidden; background: linear-gradient(135deg, #1a365d, #c6923a); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                        📜 Padre Arnulfo Mejía Rojas
                    </div>
                </div>
            </div>
        </div>

        {{-- Symbolism Section --}}
        <div class="reveal" style="margin-top: var(--space-4xl);">
            <div class="section-title">
                <span class="subtitle">Fe y cultura ancestral</span>
                <h2>Simbología</h2>
            </div>

            <div class="grid grid-3" style="margin-top: var(--space-2xl);">
                <div style="background: var(--bg-card); padding: var(--space-xl); border-radius: var(--border-radius); box-shadow: var(--shadow-sm); text-align: center;">
                    <span style="font-size: 2.5rem; display: block; margin-bottom: var(--space-md);">🐍</span>
                    <h4 style="margin-bottom: var(--space-sm);">Quetzalcóatl</h4>
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">La serpiente emplumada, deidad de sabiduría y vida, presente en los relieves del templo.</p>
                </div>
                <div style="background: var(--bg-card); padding: var(--space-xl); border-radius: var(--border-radius); box-shadow: var(--shadow-sm); text-align: center;">
                    <span style="font-size: 2.5rem; display: block; margin-bottom: var(--space-md);">☯️</span>
                    <h4 style="margin-bottom: var(--space-sm);">Ometéotl</h4>
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">El dios dual, representación de la dualidad cósmica en la cosmovisión nahua.</p>
                </div>
                <div style="background: var(--bg-card); padding: var(--space-xl); border-radius: var(--border-radius); box-shadow: var(--shadow-sm); text-align: center;">
                    <span style="font-size: 2.5rem; display: block; margin-bottom: var(--space-md);">🔤</span>
                    <h4 style="margin-bottom: var(--space-sm);">Glifos Otomíes</h4>
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">Escritura prehispánica que refleja la herencia cultural otomí de la región.</p>
                </div>
            </div>
        </div>

        {{-- Nautical Elements --}}
        <div class="reveal" style="margin-top: var(--space-4xl);">
            <div class="section-title">
                <span class="subtitle">Detalles de la embarcación</span>
                <h2>Elementos Náuticos</h2>
            </div>

            <div class="grid grid-2" style="margin-top: var(--space-2xl);">
                <div style="background: var(--bg-dark); color: var(--text-light); padding: var(--space-2xl); border-radius: var(--border-radius);">
                    <h4 style="color: var(--secondary); margin-bottom: var(--space-md);">⚓ Estructura</h4>
                    <ul style="list-style: none; color: rgba(245,240,232,0.8); font-size: 0.95rem;">
                        <li style="padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🏗️ Aproximadamente 90m de largo × 28m de alto</li>
                        <li style="padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.1);">⛵ Réplica de la carabela Santa María</li>
                        <li style="padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🪢 Mástiles, cuerdas y velamen</li>
                        <li style="padding: var(--space-sm) 0;">🎡 Timón en el "Castillo de Popa"</li>
                    </ul>
                </div>
                <div style="background: var(--bg-dark); color: var(--text-light); padding: var(--space-2xl); border-radius: var(--border-radius);">
                    <h4 style="color: var(--secondary); margin-bottom: var(--space-md);">🌊 Entorno</h4>
                    <ul style="list-style: none; color: rgba(245,240,232,0.8); font-size: 0.95rem;">
                        <li style="padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.1);">💧 Espejos de agua que simulan el mar</li>
                        <li style="padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🌿 Cortes en el pasto que imitan olas</li>
                        <li style="padding: var(--space-sm) 0; border-bottom: 1px solid rgba(255,255,255,0.1);">🏛️ Museo del padre Arnulfo</li>
                        <li style="padding: var(--space-sm) 0;">⛪ Parroquia activa con misas dominicales</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Visit Info --}}
        <div class="reveal" style="margin-top: var(--space-4xl); text-align: center;">
            <h3 style="margin-bottom: var(--space-lg);">¿Quieres visitarnos?</h3>
            <p style="color: var(--text-secondary); margin-bottom: var(--space-xl); max-width: 500px; margin-left: auto; margin-right: auto;">
                Planifica tu visita a La Barca de la Fe y descubre también todo lo que Tlaxco, Pueblo Mágico, tiene para ofrecerte.
            </p>
            <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('contact') }}" class="btn btn-primary">📞 Contacto</a>
                <a href="{{ route('como-llegar') }}" class="btn btn-secondary">📍 Cómo Llegar</a>
            </div>
        </div>
    </div>
</section>

@endsection
