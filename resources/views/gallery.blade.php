@extends('layouts.portal')

@section('title', 'Galería — La Barca de la Fe')
@section('meta_description', 'Galería de fotos de La Barca de la Fe en Tlaxco, Tlaxcala. Explora la arquitectura, detalles y belleza de este templo único.')

@section('content')

<section class="page-hero" style="background-image: url('{{ asset('images/gallery-hero.jpg') }}'); background-color: #1a365d;">
    <div class="page-hero-content">
        <span class="breadcrumb"><a href="{{ route('home') }}">Inicio</a> / Galería</span>
        <h1>Galería</h1>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<section class="section">
    <div class="container">
        {{-- Filters --}}
        @if($albums->count())
            <div class="gallery-filters reveal">
                <a href="{{ route('gallery') }}" class="{{ !$album ? 'active' : '' }}">Todas</a>
                @foreach($albums as $albumName)
                    <a href="{{ route('gallery', ['album' => $albumName]) }}"
                       class="{{ $album === $albumName ? 'active' : '' }}">
                        {{ ucfirst($albumName) }}
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Gallery Grid --}}
        @if($images->count())
            <div class="gallery-grid reveal">
                @foreach($images as $image)
                    <div class="gallery-item"
                         data-lightbox="{{ asset('storage/' . $image->image_path) }}"
                         data-caption="{{ $image->title }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             alt="{{ $image->title }}" loading="lazy">
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

            <div class="pagination">
                {{ $images->withQueryString()->links() }}
            </div>
        @else
            <div class="reveal" style="text-align: center; padding: var(--space-4xl); color: var(--text-muted);">
                <p style="font-size: 3rem; margin-bottom: var(--space-md);">📸</p>
                <h3 style="color: var(--text-muted);">Próximamente</h3>
                <p>Estamos preparando nuestra galería de fotos. ¡Vuelve pronto!</p>
            </div>
        @endif
    </div>
</section>

@endsection
