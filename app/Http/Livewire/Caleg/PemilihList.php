<?php

namespace App\Http\Livewire\Caleg;

use App\Models\DaftarPemilih;
use Livewire\Component;

class PemilihList extends Component
{
    public $search, $is_calon = 'SEMUA';

    public function render()
    {
        $pemilihs = DaftarPemilih::query();

        if ($this->search != '') {
            $pemilihs->where('nama', 'like', '%' . $this->search . '%');
        }

        if ($this->is_calon == 'TRUE') {
            $pemilihs->where('is_calon', TRUE);
        }

        if ($this->is_calon == 'FALSE') {
            $pemilihs->where('is_calon', FALSE);
        }

        return view('livewire.caleg.pemilih-list', [
            'pemilihs' => $pemilihs->orderBy('nama')->get(),
        ]);
    }
}
