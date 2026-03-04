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
    Schema::create('web_settings', function (Blueprint $table) {
        $table->id();
        $table->string('hero_judul')->default('Selamat Datang di Website RVPS');
        $table->text('hero_deskripsi')->nullable();
        $table->string('hero_gambar')->nullable();
        $table->string('jam_senin_kamis')->default('08:00 - 15:00');
        $table->string('jam_jumat')->default('08:00 - 12:00');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};
