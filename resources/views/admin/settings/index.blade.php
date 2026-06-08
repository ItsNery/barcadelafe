@extends('layouts.admin')
@section('header', 'Configuración del Sitio')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="admin-form">
        @csrf

        @foreach($settings as $group => $items)
            <h3 style="margin-bottom: 1rem; margin-top: {{ !$loop->first ? '2rem' : '0' }}; text-transform: capitalize; color: #334155; border-bottom: 1px solid #e2e8f0; padding-bottom: 0.5rem;">
                @switch($group)
                    @case('general') ⚙️ General @break
                    @case('social') 📱 Redes Sociales @break
                    @case('location') 📍 Ubicación @break
                    @case('schedule') ⏰ Horarios @break
                    @default {{ ucfirst($group) }}
                @endswitch
            </h3>

            @foreach($items as $setting)
                <div class="form-group">
                    <label for="{{ $setting->key }}">
                        {{ str_replace('_', ' ', ucfirst($setting->key)) }}
                    </label>
                    @if($setting->type === 'textarea')
                        <textarea id="{{ $setting->key }}" name="{{ $setting->key }}" rows="3">{{ $setting->value }}</textarea>
                    @else
                        <input type="{{ $setting->type === 'url' ? 'url' : 'text' }}"
                               id="{{ $setting->key }}" name="{{ $setting->key }}"
                               value="{{ $setting->value }}">
                    @endif
                </div>
            @endforeach
        @endforeach

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn-admin btn-admin-primary">💾 Guardar Configuración</button>
        </div>
    </form>
</div>

@endsection
