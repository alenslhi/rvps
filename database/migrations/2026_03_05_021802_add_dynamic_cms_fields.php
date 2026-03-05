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
    Schema::table('web_settings', function (Blueprint $table) {
        if (!Schema::hasColumn('web_settings', 'logo')) {
            $table->string('logo')->nullable();
        }
        if (!Schema::hasColumn('web_settings', 'hero_slideshow')) {
            $table->json('hero_slideshow')->nullable();
        }
        if (!Schema::hasColumn('web_settings', 'judul_section_store')) {
            $table->string('judul_section_store')->default('Produk Unggulan RVPS Store');
        }
        if (!Schema::hasColumn('web_settings', 'judul_section_blog')) {
            $table->string('judul_section_blog')->default('Catatan & Tutorial Terbaru');
        }
        if (!Schema::hasColumn('web_settings', 'judul_section_portfolio')) {
            $table->string('judul_section_portfolio')->default('Momen & Aktivitas');
        }
    });

    Schema::table('products', function (Blueprint $table) {
        if (!Schema::hasColumn('products', 'stok')) {
            $table->integer('stok')->default(0);
        }
        if (!Schema::hasColumn('products', 'galeri_produk')) {
            $table->json('galeri_produk')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
