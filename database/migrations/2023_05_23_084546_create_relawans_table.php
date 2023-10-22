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
        Schema::create('relawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik');
            $table->string('nama');
            $table->string('phone');
            $table->enum('jenjang', ['KABUPATEN', 'KECAMATAN', 'KELURAHAN']);
            $table->enum('tipe', ['Inti', 'Tambahan']);
            $table->string('file_identitas')->nullable();
            $table->foreignId('kelurahan_id')->nullable();
            $table->foreignId('kecamatan_id')->nullable();
            $table->foreignId('kabupaten_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relawans');
    }
};
