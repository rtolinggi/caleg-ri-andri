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
        Schema::create('daftar_pemilihs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik');
            $table->string('nama');
            $table->string('no_hp')->nullable();
            $table->unsignedSmallInteger('umur')->nullable();
            $table->enum('jenis_kelamin', ['PRIA', 'WANITA'])->nullable();
            $table->string('file_identitas')->nullable();
            $table->boolean('is_calon')->default(false);
            $table->foreignId('relawan_id')->nullable();
            $table->foreignId('pemungutan_suara_id')->nullable();
            $table->foreignId('rukun_tetangga_id')->nullable();
            $table->foreignId('kelurahan_id')->nullable();
            $table->foreignId('kecamatan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_pemilihs');
    }
};
