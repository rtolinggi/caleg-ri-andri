<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function pemungutan_suaras()
    {
        return $this->hasMany(PemungutanSuara::class);
    }

    public function relawans()
    {
        return $this->hasMany(Relawan::class);
    }

    public function daftar_pemilihs()
    {
        return $this->hasMany(DaftarPemilih::class);
    }

    public function calon_pemilihs()
    {
        return $this->hasMany(DaftarPemilih::class)->where('is_calon', true);
    }
}
