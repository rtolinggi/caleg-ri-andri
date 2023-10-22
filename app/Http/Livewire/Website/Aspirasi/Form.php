<?php

namespace App\Http\Livewire\Website\Aspirasi;

use App\Models\Aspirasi;
use Livewire\Component;

class Form extends Component
{
    public $nama, $no_hp, $aspirasi;

    public function render()
    {
        return view('livewire.website.aspirasi.form');
    }

    public function store()
    {
        Aspirasi::create([
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'aspirasi' => $this->aspirasi,
        ]);

        session()->flash('message', 'Aspirasi Anda Berhasil Terkirim.');

        return redirect()->back();
    }
}
