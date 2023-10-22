<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function rukun_tetanggas()
    {
        return $this->hasMany(RukunTetangga::class);
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
