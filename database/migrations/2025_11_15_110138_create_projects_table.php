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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Proyek
            $table->string('category'); // Kategori (cth: "Web App", "Landing Page")
            $table->text('description'); // Deskripsi lengkap proyek
            $table->string('image')->nullable(); // Path ke gambar utama
            $table->string('project_url')->nullable(); // Link ke website live
            $table->string('github_url')->nullable(); // Link ke GitHub
            $table->date('project_date'); // Tanggal proyek selesai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
