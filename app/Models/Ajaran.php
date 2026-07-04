<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'desa',
        'tahun',
        'isi',
        'contoh',
        'referensi',
        'gambar',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}