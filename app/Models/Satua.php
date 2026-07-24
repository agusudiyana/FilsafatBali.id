<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satua extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'tokoh',
        'asal',
        'gambar',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}