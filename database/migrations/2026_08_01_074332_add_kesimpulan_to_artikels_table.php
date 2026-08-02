<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            // Tambahkan kolom kesimpulan (nullable agar data lama tidak error)
            $table->text('kesimpulan')->nullable()->after('isi');
        });
    }

    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->dropColumn('kesimpulan');
        });
    }
};