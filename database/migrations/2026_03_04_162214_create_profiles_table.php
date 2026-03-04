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
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('peran');
        $table->text('bio_singkat');
        $table->string('foto_profil')->nullable();
        $table->string('alamat')->nullable();
        $table->string('email')->nullable();
        $table->string('whatsapp')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
