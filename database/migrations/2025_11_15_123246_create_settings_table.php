<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // <-- 1. PASTIKAN INI DI-IMPORT

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Buat tabel
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // 2. Siapkan data default (semua key yang kita butuhkan)
        $defaultSettings = [
            // Hero
            ['key' => 'hero_title', 'value' => '[Nama Anda]'],
            ['key' => 'hero_subtitle', 'value' => 'I am a Web Developer'],
            ['key' => 'hero_description', 'value' => 'Deskripsi singkat tentang diri Anda...'],
            ['key' => 'hero_photo_path', 'value' => ''],

            // Stats
            ['key' => 'stat_1_number', 'value' => '1+'],
            ['key' => 'stat_1_text', 'value' => 'Tahun Pengalaman'],
            ['key' => 'stat_2_number', 'value' => '10+'],
            ['key' => 'stat_2_text', 'value' => 'Proyek Selesai'],
            ['key' => 'stat_3_number', 'value' => '5+'],
            ['key' => 'stat_3_text', 'value' => 'Klien Puas'],

            // About
            ['key' => 'about_text', 'value' => 'Teks "About Me" Anda...'],
            ['key' => 'tech_skills', 'value' => 'Laravel,PHP,MySQL,Alpine.js'],

            // Socials
            ['key' => 'social_whatsapp', 'value' => ''],
            ['key' => 'social_facebook', 'value' => ''],
            ['key' => 'social_tiktok', 'value' => ''],
            ['key' => 'social_instagram', 'value' => ''],
            ['key' => 'social_github', 'value' => ''],
            ['key' => 'social_linkedin', 'value' => ''],
            ['key' => 'social_twitter', 'value' => ''],
        ];

        // 3. Masukkan data default ke tabel
        foreach ($defaultSettings as $setting) {
            DB::table('settings')->insert([
                'key' => $setting['key'],
                'value' => $setting['value'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
