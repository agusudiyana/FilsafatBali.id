<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satua extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'sub_judul',
        'asal',
        'gambar',
        'ringkasan',
        'isi',
        'tokoh',
        'alur',
        'moral',
        'filosofi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}