<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_at',
    ];

    /**
     * Cast 'read_at' sebagai tipe data Carbon (tanggal/waktu).
     */
    protected $casts = [
        'read_at' => 'datetime',
    ];
}
