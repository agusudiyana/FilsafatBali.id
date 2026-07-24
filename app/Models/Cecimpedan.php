<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cecimpedan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'isi',
        'jawaban',
        'kategori',
        'gambar',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}