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
        Schema::create('rukun_tetanggas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id');
            $table->foreignId('kelurahan_id');
            $table->string('nama');
            $table->unsignedInteger('target_pemilih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rukun_tetanggas');
    }
};
