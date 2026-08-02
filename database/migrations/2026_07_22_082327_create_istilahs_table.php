<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('istilahs', function (Blueprint $table) {
            $table->id();

            // Relasi ke User
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Field Utama Istilah
            $table->string('istilah');
            $table->string('penulis')->nullable();
            $table->text('arti');
            $table->string('kategori')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('contoh_penggunaan')->nullable();
            $table->string('padanan_kata')->nullable();
            $table->string('gambar')->nullable();

            // Status Moderasi
            $table->enum('status', [
                'pending',
                'disetujui',
                'ditolak'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('istilahs');
    }
};