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
        Schema::create('profilesekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('name_sekolah');
            $table->string('kepalasekolah');
            $table->string('foto');
            $table->string('logo');
            $table->string('npsn');
            $table->text('alamat');
            $table->string('kontak');
            $table->text('visi_misi');
            $table->year('tahun_berdiri');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profilesekolahs');
    }
};
