<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPemilih extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_calon' => 'boolean',
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

    public function rukunTetangga()
    {
        return $this->belongsTo(RukunTetangga::class);
    }

    public function relawan()
    {
        return $this->belongsTo(Relawan::class);
    }

    public function pemungutan_suara()
    {
        return $this->belongsTo(PemungutanSuara::class);
    }

    public function pemungutanSuara()
    {
        return $this->belongsTo(PemungutanSuara::class);
    }
}
