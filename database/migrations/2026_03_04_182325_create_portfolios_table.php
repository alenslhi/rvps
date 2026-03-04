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
    Schema::create('portfolios', function (Blueprint $table) {
        $table->id();
        $table->string('judul'); // Contoh: "Sistem Informasi E-Government"
        $table->string('deskripsi_singkat'); // Contoh: "Dibangun dengan Laravel & Tailwind"
        $table->string('gambar');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
