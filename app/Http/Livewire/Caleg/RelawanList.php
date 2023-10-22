<?php

namespace App\Http\Livewire\Caleg;

use App\Models\Relawan;
use Livewire\Component;

class RelawanList extends Component
{
    public $search, $jenjang = 'SEMUA';

    public function render()
    {
        $relawans = Relawan::with('calon_pemilihs');

        if ($this->search != '') {
            $relawans->where('nama', 'like', '%' . $this->search . '%');
        }

        if ($this->jenjang != 'SEMUA') {
            $relawans->where('jenjang', $this->jenjang);
        }

        return view('livewire.caleg.relawan-list', [
            'relawans' => $relawans->orderBy('nama')->get(),
        ]);
    }
}
