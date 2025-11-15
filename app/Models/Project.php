<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal.
     * (Mengganti 'name' dengan 'title')
     */
    protected $fillable = [
        'title', // <-- PERBAIKAN DI SINI
        'category',
        'description',
        'image',
        'project_url',
        'shopee_url',
        'project_date',
    ];

    /**
     * Cast 'project_date' sebagai tipe data Carbon (tanggal/waktu).
     */
    protected $casts = [
        'project_date' => 'datetime',
    ];
}
