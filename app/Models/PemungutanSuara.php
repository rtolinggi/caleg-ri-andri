<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemungutanSuara extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_lock' => 'boolean',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function rukun_tetangga()
    {
        return $this->belongsTo(RukunTetangga::class);
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
