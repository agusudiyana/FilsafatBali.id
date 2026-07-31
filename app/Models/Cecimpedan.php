<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cecimpedan extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'tingkat',
    'pertanyaan',
    'terjemahan',
    'jawaban',
    'makna',
    'filosofi',
    'variasi_daerah',
    'asal_daerah',
    'rekaman',
    'status',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}