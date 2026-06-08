<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@labarcadelafe.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Blog categories
        $categories = [
            ['name' => 'Espiritualidad', 'slug' => 'espiritualidad', 'description' => 'Reflexiones espirituales y de fe'],
            ['name' => 'Historia', 'slug' => 'historia', 'description' => 'Historia del templo y la región'],
            ['name' => 'Turismo', 'slug' => 'turismo', 'description' => 'Guías y recomendaciones turísticas'],
            ['name' => 'Eventos', 'slug' => 'eventos', 'description' => 'Festividades y eventos especiales'],
            ['name' => 'Comunidad', 'slug' => 'comunidad', 'description' => 'Noticias de la comunidad'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Site settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'La Barca de la Fe', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Un viaje entre lo divino y lo ancestral — Templo único en Tlaxco, Tlaxcala', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'contacto@labarcadelafe.com', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_phone', 'value' => '', 'type' => 'text', 'group' => 'general'],

            // Social media
            ['key' => 'facebook_url', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => '', 'type' => 'text', 'group' => 'social'],

            // Location
            ['key' => 'address', 'value' => 'Calle V Centenario, José María Morelos Buenavista, Tlaxco, Tlaxcala', 'type' => 'text', 'group' => 'location'],
            ['key' => 'map_latitude', 'value' => '19.6372', 'type' => 'text', 'group' => 'location'],
            ['key' => 'map_longitude', 'value' => '-98.1186', 'type' => 'text', 'group' => 'location'],

            // Schedule
            ['key' => 'schedule_info', 'value' => 'Misas dominicales. Abierto al público para visitas.', 'type' => 'textarea', 'group' => 'schedule'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
