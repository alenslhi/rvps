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
        // Update tabel web_settings
        Schema::table('web_settings', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->json('hero_slideshow')->nullable();
        });

        // Update tabel products
        Schema::table('products', function (Blueprint $table) {
            $table->json('galeri_produk')->nullable();
            $table->integer('stok')->default(0);
        });

        // Buat tabel schedules (HANYA SATU KALI)
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('jam'); 
            $table->string('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel schedules saat rollback
        Schema::dropIfExists('schedules');

        // Rollback perubahan products
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['galeri_produk', 'stok']);
        });

        // Rollback perubahan web_settings
        Schema::table('web_settings', function (Blueprint $table) {
            $table->dropColumn(['logo', 'hero_slideshow']);
        });
    }
};