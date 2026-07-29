<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'bookmarks';

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'user_id',
        'item_title',
        'item_type',
        'item_url'
    ];
}