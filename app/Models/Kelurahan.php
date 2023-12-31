<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
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
        return $this->hasMany(DaftarPemilih::class)
            ->where('is_calon', true);
    }

    public function pemungutan_suaras()
    {
        return $this->hasMany(PemungutanSuara::class);
    }
}
