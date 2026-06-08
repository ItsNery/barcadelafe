@extends('layouts.portal')

@section('title', 'Cómo Llegar — La Barca de la Fe')
@section('meta_description', 'Cómo llegar a La Barca de la Fe en Tlaxco, Tlaxcala. Rutas, tips de viaje y recomendaciones.')

@section('content')

<section class="page-hero" style="background-image: url('{{ asset('images/page-hero.jpg') }}'); background-color: #1a365d;">
    <div class="page-hero-content">
        <span class="breadcrumb"><a href="{{ route('home') }}">Inicio</a> / Cómo Llegar</span>
        <h1>Cómo Llegar</h1>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<section class="section">
    <div class="container-narrow">
        <div class="post-body reveal">
            <p>La Barca de la Fe se localiza en la calle V Centenario, en el poblado de José María Morelos Buenavista (San Andrés Buenavista), a aproximadamente 27 km de la cabecera municipal de Tlaxco.</p>
            <p><strong>Desde Tlaxco:</strong> Toma la carretera rumbo a Chignahuapan, aproximadamente 25-30 minutos.</p>
            <p><strong>Desde Puebla:</strong> Toma la autopista hacia Tlaxcala, luego la carretera a Tlaxco. Tiempo aproximado: 2.5 horas.</p>
            <p><strong>Tips:</strong> Al estar en zona rural, verifica la ruta con anticipación. El clima es semi-frío (2,500 msnm), lleva ropa abrigadora.</p>
        </div>
    </div>
</section>

@endsection
