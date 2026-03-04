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
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique(); // Untuk URL SEO friendly (contoh: tutorial-laravel-11)
        $table->string('kategori'); // Misal: Laravel, Android, Baileys, dsb.
        $table->string('thumbnail');
        $table->longText('konten'); // Isinya bisa panjang dan mengandung format HTML
        $table->boolean('is_published')->default(true); // Status rilis atau draft
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
