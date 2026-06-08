@extends('layouts.portal')

@section('title', 'Contacto — La Barca de la Fe')
@section('meta_description', 'Contacta con La Barca de la Fe en Tlaxco, Tlaxcala. Envíanos tus dudas, sugerencias o planea tu visita.')

@section('content')

<section class="page-hero" style="background-image: url('{{ asset('images/contact-hero.jpg') }}'); background-color: #1a365d;">
    <div class="page-hero-content">
        <span class="breadcrumb"><a href="{{ route('home') }}">Inicio</a> / Contacto</span>
        <h1>Contacto</h1>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<section class="section">
    <div class="container">
        <div class="section-title reveal">
            <span class="subtitle">Estamos para ayudarte</span>
            <h2>Escríbenos</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success reveal">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="contact-grid reveal">
            {{-- Form --}}
            <div>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Tu nombre completo">
                        @error('name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="tu@email.com">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject">Asunto *</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required placeholder="¿Sobre qué nos escribes?">
                        @error('subject')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Mensaje *</label>
                        <textarea id="message" name="message" required placeholder="Escribe tu mensaje aquí...">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                        ✉️ Enviar Mensaje
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div>
                <div class="contact-info-card">
                    <h3>Información de Contacto</h3>

                    <div class="contact-info-item">
                        <span class="info-icon">📍</span>
                        <div>
                            <h4>Dirección</h4>
                            <p>{{ \App\Models\Setting::get('address', 'Calle V Centenario, José María Morelos Buenavista, Tlaxco, Tlaxcala') }}</p>
                        </div>
                    </div>

                    @if(\App\Models\Setting::get('site_phone'))
                    <div class="contact-info-item">
                        <span class="info-icon">📞</span>
                        <div>
                            <h4>Teléfono</h4>
                            <p>{{ \App\Models\Setting::get('site_phone') }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="contact-info-item">
                        <span class="info-icon">✉️</span>
                        <div>
                            <h4>Correo</h4>
                            <p>{{ \App\Models\Setting::get('site_email', 'contacto@labarcadelafe.com') }}</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <span class="info-icon">⏰</span>
                        <div>
                            <h4>Horarios</h4>
                            <p>{{ \App\Models\Setting::get('schedule_info', 'Misas dominicales. Abierto para visitas.') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Map --}}
                <div class="map-container" style="margin-top: var(--space-xl);">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.5!2d-98.1186!3d19.6372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDM4JzE0LjAiTiA5OMKwMDcnMDcuMCJX!5e0!3m2!1ses!2smx!4v1"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
