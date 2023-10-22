<?php

namespace App\Http\Livewire\Saksi;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PemungutanSuara;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateSuaraTps extends Component
{
    use WithFileUploads;

    public $selectedKecamatan, $selectedKelurahan, $selectedTPS;
    public $kelurahanOptions = [];
    public $tpsOptions = [];
    public $jumlah_suara;
    public $file_bukti;

    protected $rules = [
        'selectedKecamatan' => 'required',
        'selectedKelurahan' => 'required',
        'selectedTPS'       => 'required',
        'jumlah_suara'      => 'required',
        'file_bukti'        => 'required|image',
    ];

    protected $messages = [
        'selectedKecamatan.required' => 'Kecamatan tidak boleh kosong.',
        'selectedKelurahan.required' => 'Kelurahan tidak boleh kosong.',
        'selectedTPS.required'       => 'TPS tidak boleh kosong.',
        'jumlah_suara.required'      => 'Jumlah Suara tidak boleh kosong.',
        'file_bukti.required'        => 'File bukti tidak boleh kosong.',
        'file_bukti.image'           => 'File bukti harus berupa gambar.',
    ];

    public function render()
    {
        return view('livewire.saksi.update-suara-tps', [
            'kecamatans' => Kecamatan::orderBy('nama')->get()
        ]);
    }

    public function updatedSelectedKecamatan()
    {
        $this->kelurahanOptions = Kelurahan::where('kecamatan_id', $this->selectedKecamatan)
            ->orderBy('nama')
            ->get();
    }

    public function updatedSelectedKelurahan()
    {
        $this->tpsOptions = PemungutanSuara::where('kelurahan_id', $this->selectedKelurahan)
            ->where('is_lock', false)
            ->orderBy('nama')
            ->get();
    }

    public function update()
    {
        $this->validate();

        PemungutanSuara::findOrFail($this->selectedTPS)->update([
            'jumlah_suara' => $this->jumlah_suara,
            'file_bukti'   => $this->file_bukti->store('pemungutan_suara'),
            'is_lock'      => true,
        ]);

        return redirect()->route('saksi.success');
    }
}
