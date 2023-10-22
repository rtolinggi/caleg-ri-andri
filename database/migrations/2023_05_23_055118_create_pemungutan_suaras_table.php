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
        Schema::create('pemungutan_suaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id');
            $table->foreignId('kelurahan_id');
            $table->string('nama');
            $table->unsignedInteger('jumlah_suara')->default(0);
            $table->string('file_bukti')->nullable()->default(null);
            $table->boolean('is_lock')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemungutan_suaras');
    }
};
