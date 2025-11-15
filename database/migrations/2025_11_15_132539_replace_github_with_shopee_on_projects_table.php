<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Hapus kolom github_url
            $table->dropColumn('github_url');

            // Tambahkan kolom shopee_url
            $table->string('shopee_url')->nullable()->after('project_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Saat rollback, tambahkan kembali github_url
            $table->string('github_url')->nullable()->after('project_url');

            // Hapus kolom shopee_url
            $table->dropColumn('shopee_url');
        });
    }
};
