<?php

namespace App\Http\Livewire\Relawan;

use App\Models\DaftarPemilih;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Relawan;
use App\Models\RukunTetangga;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePemilih extends Component
{
    use WithFileUploads;

    public $selectedKecamatan, $selectedKelurahan, $selectedRT, $selectedRelawan;
    public $kelurahanOptions = [];
    public $rtOptions = [];
    public $relawanOptions = [];

    public $nik, $nama, $umur, $jenis_kelamin, $no_hp;
    public $file_identitas;

    protected $rules = [
        'nik'               => 'required|unique:daftar_pemilihs,nik|min_digits:16|max_digits:16',
        'nama'              => 'required',
        'umur'              => 'required',
        'jenis_kelamin'     => 'required',
        'no_hp'             => 'required',
        'file_identitas'    => 'required|image',
        'selectedRelawan'   => 'required',
        'selectedRT'        => 'required',
        'selectedKelurahan' => 'required',
        'selectedKecamatan' => 'required',
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
        'selectedRT.required'        => 'RT tidak boleh kosong.',
        'selectedKelurahan.required' => 'Kelurahan tidak boleh kosong.',
        'selectedKecamatan.required' => 'Kecamatan tidak boleh kosong.',
    ];

    public function render()
    {
        return view('livewire.relawan.create-pemilih', [
            'kecamatans' => Kecamatan::orderBy('nama')->get()
        ]);
    }

    public function updatedSelectedKecamatan()
    {
        $this->kelurahanOptions = Kelurahan::where('kecamatan_id', $this->selectedKecamatan)
            ->orderBy('nama')
            ->get();

        $this->relawanOptions = Relawan::where('kecamatan_id', $this->selectedKecamatan)
            ->orderBy('nama')
            ->get();
    }

    public function updatedSelectedKelurahan()
    {
        $this->rtOptions = RukunTetangga::where('kelurahan_id', $this->selectedKelurahan)
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
            'file_identitas'      => $this->file_identitas->store('daftar_pemilih'),
            'is_calon'            => false,
            'relawan_id'          => $this->selectedRelawan,
            'pemungutan_suara_id' => null,
            'rukun_tetangga_id'   => $this->selectedRT,
            'kelurahan_id'        => $this->selectedKelurahan,
            'kecamatan_id'        => $this->selectedKecamatan,
        ]);

        return redirect()->route('relawan.success');
    }
}
