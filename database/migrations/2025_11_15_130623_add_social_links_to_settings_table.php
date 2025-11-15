<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // <-- Import DB Facade

return new class extends Migration
{
    // Kunci (keys) untuk link media sosial
    protected $socialKeys = [
        'social_whatsapp',
        'social_facebook',
        'social_tiktok',
        'social_instagram',
        'social_github',
        'social_linkedin',
        'social_twitter',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $settings = [];
        foreach ($this->socialKeys as $key) {
            $settings[] = [
                'key' => $key,
                'value' => '', // Nilai default kosong
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Masukkan data baru ke tabel settings
        DB::table('settings')->insert($settings);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus data saat rollback
        DB::table('settings')->whereIn('key', $this->socialKeys)->delete();
    }
};
