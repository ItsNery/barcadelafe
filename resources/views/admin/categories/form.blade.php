@extends('layouts.admin')
@section('header', isset($category) ? 'Editar Categoría' : 'Nueva Categoría')

@section('content')

<div class="admin-card" style="max-width: 600px;">
    <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
          method="POST" class="admin-form">
        @csrf
        @if(isset($category)) @method('PUT') @endif

        <div class="form-group">
            <label for="name">Nombre *</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
            @error('name') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="3" style="min-height: 80px;">{{ old('description', $category->description ?? '') }}</textarea>
            @error('description') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
            <button type="submit" class="btn-admin btn-admin-primary">
                {{ isset($category) ? '💾 Actualizar' : '🏷️ Crear Categoría' }}
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn-admin btn-admin-outline">Cancelar</a>
        </div>
    </form>
</div>

@endsection
