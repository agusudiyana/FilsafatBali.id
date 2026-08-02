<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filsafat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Isian Utama
            $table->string('judul');              // Contoh: Filsafat Barat
            $table->text('deskripsi');          // Penjelasan singkat di atas
            $table->string('asal')->nullable();   // Contoh: Yunani Kuno
            $table->string('fokus')->nullable();  // Contoh: Logika & Rasionalitas
            $table->text('tokoh_terkenal')->nullable(); // JSON / Text untuk daftar tokoh & penjelasannya
            $table->text('karakteristik')->nullable();  // Text untuk poin-poin karakteristik
            $table->text('implikasi')->nullable();     // Paragraf penutup / dampak kehidupan

            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('filsafat');
    }
};