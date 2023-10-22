<?php

namespace App\Http\Controllers;

use App\Models\DaftarPemilih;
use App\Models\Kecamatan;
use App\Models\Relawan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function formulir()
    {
        $dataForm = [
            'NIK', 'Nama', 'Umur', 'Jenis Kelamin', 'No. Handphone', 'Kecamatan', 'Kelurahan', 'RT', 'Nama Relawan'
        ];

        return view('admin.formulir', compact('dataForm'));
    }

    public function rekap_kecamatan($id)
    {
        return view('admin.rekap_kecamatan', [
            'kecamatan' => Kecamatan::with('kelurahans')->findOrFail($id)
        ]);
    }

    public function daftar_rekrutmen($relawan_id)
    {
        return view('admin.daftar_rekrutmen', [
            'relawan' => Relawan::with('daftar_pemilihs')->findOrFail($relawan_id),
        ]);
    }
}
