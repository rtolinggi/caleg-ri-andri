<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RukunTetangga extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
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
}
