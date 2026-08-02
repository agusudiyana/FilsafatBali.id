<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ajaran_tertua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->string('gambar')->nullable();
            $table->string('tags')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('tahun')->nullable();
            $table->text('deskripsi');
            
            // Tiga Prinsip Utama
            $table->string('prinsip1_nama')->nullable();
            $table->text('prinsip1_deskripsi')->nullable();
            $table->string('prinsip2_nama')->nullable();
            $table->text('prinsip2_deskripsi')->nullable();
            $table->string('prinsip3_nama')->nullable();
            $table->text('prinsip3_deskripsi')->nullable();
            
            // Penerapan & Sumber
            $table->text('contoh_penerapan')->nullable();
            $table->string('sumber')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ajaran_tertua');
    }
};