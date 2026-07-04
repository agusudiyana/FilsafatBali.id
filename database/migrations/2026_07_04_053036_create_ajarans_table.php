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
        Schema::create('ajarans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('desa')->nullable();
            $table->string('tahun')->nullable();
            $table->longText('isi');
            $table->text('contoh')->nullable();
            $table->text('referensi')->nullable();
            $table->string('gambar')->nullable();
            $table->enum('status', ['pending', 'disetujui'])->default('pending');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajarans');
    }
};