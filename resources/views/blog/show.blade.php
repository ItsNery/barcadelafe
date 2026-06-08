@extends('layouts.portal')

@section('title', $post->title . ' — La Barca de la Fe')
@section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->content), 160))

@section('content')

<section class="page-hero" style="background-image: url('{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('images/blog-hero.jpg') }}'); background-color: #1a365d;">
    <div class="page-hero-content">
        <span class="breadcrumb"><a href="{{ route('home') }}">Inicio</a> / <a href="{{ route('blog.index') }}">Blog</a> / {{ Str::limit($post->title, 40) }}</span>
        <h1>{{ $post->title }}</h1>
    </div>
</section>

<div class="wave-divider">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path fill="#faf5ef" d="M0,40 C360,80 720,0 1080,40 C1260,60 1360,50 1440,40 L1440,80 L0,80 Z"></path>
    </svg>
</div>

<article class="post-content">
    {{-- Post Header --}}
    <header class="post-header reveal">
        @if($post->category)
            <span class="post-category">{{ $post->category->name }}</span>
        @endif
        <h1>{{ $post->title }}</h1>
        <div class="post-meta">
            <span>📅 {{ $post->formatted_date }}</span>
            &nbsp;·&nbsp;
            <span>✍️ {{ $post->user->name }}</span>
        </div>
    </header>

    {{-- Featured Image --}}
    @if($post->featured_image)
        <div class="reveal" style="margin-bottom: var(--space-2xl);">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                 style="border-radius: var(--border-radius); width: 100%; box-shadow: var(--shadow-md);">
        </div>
    @endif

    {{-- Post Body --}}
    <div class="post-body reveal">
        {!! $post->content !!}
    </div>

    {{-- Share / Back --}}
    <div class="reveal" style="margin-top: var(--space-3xl); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-md);">
        <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm">← Volver al Blog</a>
        @if($post->category)
            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="btn btn-secondary btn-sm">
                {{ $post->category->name }}
            </a>
        @endif
    </div>

    {{-- Related Posts --}}
    @if($relatedPosts->count())
        <div class="related-posts reveal">
            <h3 style="text-align: center; margin-bottom: var(--space-2xl);">Artículos Relacionados</h3>
            <div class="grid grid-3">
                @foreach($relatedPosts as $related)
                    <article class="card">
                        <div class="card-image" style="height: 160px;">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}">
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #1a365d, #c6923a); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                    ✏️
                                </div>
                            @endif
                        </div>
                        <div class="card-body" style="padding: var(--space-lg);">
                            <h3 style="font-size: 1rem;"><a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a></h3>
                            <div class="card-meta">
                                <span>📅 {{ $related->formatted_date }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @endif
</article>

@endsection
