<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Istilah extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'istilah',
        'arti',
        'kategori',
        'gambar',
        'sejarah',
        'contoh_penggunaan',
        'padanan_kata',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}