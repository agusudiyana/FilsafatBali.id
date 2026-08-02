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
        Schema::create('cecimpedans', function (Blueprint $table) {
            $table->id();

            // Relasi ke User
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Field Utama Cecimpedan
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();
            $table->string('tingkat')->nullable();            // Kolom tingkat (Mudah/Sedang/Sukar)
            $table->text('pertanyaan');                       // Pertanyaan teka-teki
            $table->text('terjemahan')->nullable();           // Terjemahan pertanyaan
            $table->string('jawaban');                        // Jawaban teka-teki
            $table->text('makna')->nullable();                // Makna jawaban
            $table->text('filosofi')->nullable();             // Nilai filosofi
            $table->string('variasi_daerah')->nullable();     // Variasi dialek/daerah
            $table->string('asal_daerah')->nullable();        // Asal daerah di Bali
            $table->string('rekaman')->nullable();            // File audio/rekaman jika ada
            $table->string('gambar')->nullable();             // Gambar pendukung
            $table->string('kategori')->nullable();           // Kategori tambahan

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
        Schema::dropIfExists('cecimpedans');
    }
};