<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjaranTertua extends Model
{
    use HasFactory;

    protected $table = 'ajaran_tertua';

    protected $fillable = [
        'user_id',
        'judul',
        'gambar',
        'tags',
        'lokasi',
        'tahun',
        'deskripsi',
        'prinsip1_nama',
        'prinsip1_deskripsi',
        'prinsip2_nama',
        'prinsip2_deskripsi',
        'prinsip3_nama',
        'prinsip3_deskripsi',
        'contoh_penerapan',
        'sumber',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}