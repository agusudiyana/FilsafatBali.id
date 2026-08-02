<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filsafat extends Model
{
    use HasFactory;

    protected $table = 'filsafat';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'asal',
        'fokus',
        'tokoh_terkenal',
        'karakteristik',
        'implikasi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}