@extends('layouts.admin')
@section('header', isset($post) ? 'Editar Post' : 'Nuevo Post')

@section('content')

<div class="admin-card" style="max-width: 800px;">
    <form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}"
          method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @if(isset($post)) @method('PUT') @endif

        <div class="form-group">
            <label for="title">Título *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
            @error('title') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="excerpt">Extracto</label>
            <textarea id="excerpt" name="excerpt" rows="3" style="min-height: 80px;" placeholder="Breve resumen del post...">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            @error('excerpt') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenido *</label>
            <textarea id="content" name="content" rows="12" required>{{ old('content', $post->content ?? '') }}</textarea>
            @error('content') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select id="category_id" name="category_id">
                    <option value="">— Sin categoría —</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Descripción (SEO)</label>
                <input type="text" id="meta_description" name="meta_description"
                       value="{{ old('meta_description', $post->meta_description ?? '') }}" maxlength="160"
                       placeholder="Máximo 160 caracteres">
            </div>
        </div>

        <div class="form-group">
            <label for="featured_image">Imagen Destacada</label>
            @if(isset($post) && $post->featured_image)
                <div style="margin-bottom: 0.5rem;">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" style="max-width: 200px; border-radius: 8px;">
                </div>
            @endif
            <input type="file" id="featured_image" name="featured_image" accept="image/*">
            @error('featured_image') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" value="1"
                       {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}>
                Publicar inmediatamente
            </label>
        </div>

        <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
            <button type="submit" class="btn-admin btn-admin-primary">
                {{ isset($post) ? '💾 Actualizar' : '📝 Crear Post' }}
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>

@endsection
