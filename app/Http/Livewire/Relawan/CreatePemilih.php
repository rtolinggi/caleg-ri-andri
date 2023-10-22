<?php

namespace App\Http\Livewire\Relawan;

use App\Models\DaftarPemilih;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Relawan;
use App\Models\RukunTetangga;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePemilih extends Component
{
    use WithFileUploads;

    public $selectedKabupaten, $selectedKecamatan, $selectedKelurahan, $selectedRelawan, $selectedPekerjaan;
    public $kecamatanOptions = [];
    public $pekerjaanOptions = [
        'PEDAGANG' => 'Pedagang',
        'NELAYAN' => 'Nelayan',
        'PNS' => 'Pegawai Negeri Sipil (PNS)',
        'BUMN/BUMD' => 'BUMN / BUMD',
        'SWASTA' => 'Swasta',
        'IRT' => 'Ibu Rumah Tangga',
        'LAIN-LAIN' => 'Lain-Lain',
    ];
    public $kelurahanOptions = [];
    public $relawanOptions = [];

    public $nik, $nama, $pekerjaan, $umur, $jenis_kelamin, $no_hp;
    public $file_identitas;

    protected $rules = [
        'nik'               => 'required|unique:daftar_pemilihs,nik|min_digits:16|max_digits:16',
        'nama'              => 'required',
        'umur'              => 'required',
        'jenis_kelamin'     => 'required',
        'no_hp'             => 'required',
        'file_identitas'    => 'required|image',
        'selectedRelawan'   => 'required',
        'selectedKelurahan' => 'required',
        'selectedKecamatan' => 'required',
        'selectedKabupaten' => 'required',
        'selectedPekerjaan' => 'required',
    ];

    protected $messages = [
        'nik.required'               => 'NIK tidak boleh kosong.',
        'nik.unique'                 => 'NIK sudah terdaftar pada sistem.',
        'nik.min_digits'             => 'NIK Harus 16 Digits.',
        'nik.max_digits'             => 'NIK Harus 16 Digits.',
        'nama.required'              => 'Nama tidak boleh kosong.',
        'umur.required'              => 'Umur tidak boleh kosong.',
        'jenis_kelamin.required'     => 'Jenis Kelamin tidak boleh kosong.',
        'no_hp.required'             => 'No. Handphone tidak boleh kosong.',
        'file_identitas.required'    => 'File identitas tidak boleh kosong.',
        'file_identitas.image'       => 'File identitas harus berupa gambar.',
        'selectedRelawan.required'   => 'Relawan tidak boleh kosong.',
        'selectedKelurahan.required' => 'Kelurahan tidak boleh kosong.',
        'selectedKecamatan.required' => 'Kecamatan tidak boleh kosong.',
        'selectedKabupaten.required' => 'Kabupaten tidak boleh kosong.',
        'selectedPekerjaan.required' => 'Pekerjaan tidak boleh kosong.',
    ];

    public function render()
    {
        return view('livewire.relawan.create-pemilih', [
            'kabupatens' => Kabupaten::orderBy('nama')->get(),
        ]);
    }

    public function updatedSelectedKabupaten()
    {
        $this->kecamatanOptions = Kecamatan::where('kabupaten_id', $this->selectedKabupaten)
            ->orderBy('nama')
            ->get();
    }

    public function updatedSelectedKecamatan()
    {
        $this->kelurahanOptions = Kelurahan::where('kecamatan_id', $this->selectedKecamatan)
            ->orderBy('nama')
            ->get();
    }

    public function updatedSelectedKelurahan()
    {
        $this->relawanOptions = Relawan::where('kabupaten_id', $this->selectedKabupaten)
            ->orderBy('nama')
            ->get();
    }

    public function store()
    {
        $this->validate();

        DaftarPemilih::create([
            'nik'                 => $this->nik,
            'nama'                => $this->nama,
            'umur'                => $this->umur,
            'jenis_kelamin'       => $this->jenis_kelamin,
            'no_hp'               => $this->no_hp,
            'pekerjaan'           => $this->selectedPekerjaan,
            'file_identitas'      => $this->file_identitas->store('daftar_pemilih'),
            'is_calon'            => false,
            'relawan_id'          => $this->selectedRelawan,
            'pemungutan_suara_id' => null,
            'kelurahan_id'        => $this->selectedKelurahan,
            'kecamatan_id'        => $this->selectedKecamatan,
            'kabupaten_id'        => $this->selectedKabupaten,
        ]);

        return redirect()->route('relawan.success');
    }
}
