@extends('layouts.admin')
@section('header', isset($image) ? 'Editar Imagen' : 'Nueva Imagen')

@section('content')

<div class="admin-card" style="max-width: 600px;">
    <form action="{{ isset($image) ? route('admin.gallery.update', $image) : route('admin.gallery.store') }}"
          method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @if(isset($image)) @method('PUT') @endif

        <div class="form-group">
            <label for="title">Título *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $image->title ?? '') }}" required>
            @error('title') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="3" style="min-height: 80px;">{{ old('description', $image->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Imagen {{ isset($image) ? '' : '*' }}</label>
            @if(isset($image))
                <div style="margin-bottom: 0.5rem;">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="" style="max-width: 200px; border-radius: 8px;">
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*" {{ isset($image) ? '' : 'required' }}>
            @error('image') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="album">Álbum *</label>
                <input type="text" id="album" name="album" value="{{ old('album', $image->album ?? 'general') }}" required
                       placeholder="ej: exterior, interior, museo">
            </div>

            <div class="form-group">
                <label for="order">Orden</label>
                <input type="number" id="order" name="order" value="{{ old('order', $image->order ?? 0) }}" min="0">
            </div>
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="hidden" name="is_featured" value="0">
                <input type="checkbox" name="is_featured" value="1"
                       {{ old('is_featured', $image->is_featured ?? false) ? 'checked' : '' }}>
                ⭐ Imagen destacada (aparece en la página principal)
            </label>
        </div>

        <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
            <button type="submit" class="btn-admin btn-admin-primary">
                {{ isset($image) ? '💾 Actualizar' : '🖼️ Subir Imagen' }}
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>

@endsection
