<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Data stats yang akan ditambahkan (tanpa kolom 'type')
        $statsData = [
            ['key' => 'stat_1_number', 'value' => '1+'],
            ['key' => 'stat_1_text', 'value' => 'Tahun Pengalaman'],
            ['key' => 'stat_2_number', 'value' => '10+'],
            ['key' => 'stat_2_text', 'value' => 'Proyek Selesai'],
            ['key' => 'stat_3_number', 'value' => '5+'],
            ['key' => 'stat_3_text', 'value' => 'Klien Puas'],
        ];

        foreach ($statsData as $data) {
            // Kita hanya akan insert 'key' dan 'value'
            DB::table('settings')->insertOrIgnore([
                'key' => $data['key'],
                'value' => $data['value'],
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
        // Menghapus data stats yang ditambahkan saat rollback
        DB::table('settings')->whereIn('key', [
            'stat_1_number', 'stat_1_text',
            'stat_2_number', 'stat_2_text',
            'stat_3_number', 'stat_3_text',
        ])->delete();
    }
};
