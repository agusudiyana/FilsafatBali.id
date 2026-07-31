<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('satuas', function (Blueprint $table) {
            $table->string('sub_judul')->nullable()->after('judul');
            $table->text('ringkasan')->nullable()->after('gambar');
            $table->text('alur')->nullable()->after('tokoh');
            $table->text('moral')->nullable()->after('alur');
            $table->text('filosofi')->nullable()->after('moral');
        });
    }

    public function down(): void
    {
        Schema::table('satuas', function (Blueprint $table) {
            $table->dropColumn(['sub_judul', 'ringkasan', 'alur', 'moral', 'filosofi']);
        });
    }
};