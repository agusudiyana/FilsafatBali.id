<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookmarks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('item_title');
        $table->string('item_type');
        $table->string('item_url')->nullable();
        $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};