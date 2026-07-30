<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ajarans', function (Blueprint $table) {
            // Menambahkan kolom kategori setelah kolom judul
            $table->string('kategori')->nullable()->default('Ajaran Tertua')->after('judul');
        });
    }

    public function down(): void
    {
        Schema::table('ajarans', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};