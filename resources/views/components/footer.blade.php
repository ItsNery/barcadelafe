{{-- Footer Component --}}
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            {{-- Brand --}}
            <div>
                <span class="footer-brand">⛵ La Barca de la Fe</span>
                <p class="footer-description">
                    Un viaje entre lo divino y lo ancestral. Templo único con forma de carabela
                    en San Andrés Buenavista, Tlaxco, Tlaxcala.
                </p>
                <div class="social-links">
                    @if(\App\Models\Setting::get('facebook_url'))
                        <a href="{{ \App\Models\Setting::get('facebook_url') }}" target="_blank" rel="noopener" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4>Explorar</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('temple') }}">El Templo</a></li>
                    <li><a href="{{ route('gallery') }}">Galería</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
            </div>

            {{-- Info --}}
            <div>
                <h4>Información</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('contact') }}">Contacto</a></li>
                    <li><a href="{{ route('como-llegar') }}">Cómo Llegar</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4>Contacto</h4>
                <ul class="footer-links">
                    <li>📍 {{ \App\Models\Setting::get('address', 'Tlaxco, Tlaxcala') }}</li>
                    @if(\App\Models\Setting::get('site_phone'))
                        <li>📞 {{ \App\Models\Setting::get('site_phone') }}</li>
                    @endif
                    <li>✉️ {{ \App\Models\Setting::get('site_email', 'contacto@labarcadelafe.com') }}</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} La Barca de la Fe. Todos los derechos reservados.</span>
            <span>Tlaxco, Tlaxcala — Pueblo Mágico 🇲🇽</span>
        </div>
    </div>
</footer>
