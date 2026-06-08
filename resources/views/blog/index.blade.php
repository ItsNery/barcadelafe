@extends('layouts.portal')

@section('title', 'Blog — La Barca de la Fe')
@section('meta_description', 'Blog de La Barca de la Fe: artículos sobre espiritualidad, historia, turismo y la comunidad de Tlaxco, Tlaxcala.')

@section('content')

<section class="page-hero" style="background-image: url('{{ asset('images/blog-hero.jpg') }}'); background-color: #1a365d;">
    <div class="page-hero-content">
        <span class="breadcrumb"><a href="{{ route('home') }}">Inicio</a> / Blog</span>
        <h1>Blog</h1>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<section class="section">
    <div class="container">
        <div class="blog-layout">
            {{-- Posts --}}
            <div>
                @if($search)
                    <div class="reveal" style="margin-bottom: var(--space-2xl);">
                        <p style="color: var(--text-muted);">Resultados para: <strong>"{{ $search }}"</strong></p>
                    </div>
                @endif

                @if($posts->count())
                    <div class="grid grid-2 reveal">
                        @foreach($posts as $post)
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
                                    <p>{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                                    <div class="card-meta">
                                        <span>📅 {{ $post->formatted_date }}</span>
                                        <span>✍️ {{ $post->user->name }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="pagination">
                        {{ $posts->withQueryString()->links() }}
                    </div>
                @else
                    <div style="text-align: center; padding: var(--space-4xl); color: var(--text-muted);">
                        <p style="font-size: 3rem; margin-bottom: var(--space-md);">📝</p>
                        <h3 style="color: var(--text-muted);">No hay publicaciones</h3>
                        <p>{{ $search ? 'No se encontraron resultados para tu búsqueda.' : 'Pronto publicaremos contenido interesante.' }}</p>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="sidebar">
                {{-- Search --}}
                <div class="widget reveal">
                    <h4>Buscar</h4>
                    <form action="{{ route('blog.index') }}" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="Buscar artículos..." value="{{ $search }}">
                        <button type="submit">🔍</button>
                    </form>
                </div>

                {{-- Categories --}}
                <div class="widget reveal">
                    <h4>Categorías</h4>
                    <ul class="category-list">
                        <li>
                            <a href="{{ route('blog.index') }}" class="{{ !$category ? 'active' : '' }}">
                                Todas <span class="count">{{ $posts->total() }}</span>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('blog.index', ['category' => $cat->slug]) }}"
                                   class="{{ $category === $cat->slug ? 'active' : '' }}">
                                    {{ $cat->name }}
                                    <span class="count">{{ $cat->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- About Widget --}}
                <div class="widget reveal">
                    <h4>Sobre Nosotros</h4>
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">
                        La Barca de la Fe es un templo único en el mundo, ubicado en Tlaxco, Pueblo Mágico.
                        En este blog compartimos historias, reflexiones y novedades.
                    </p>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
