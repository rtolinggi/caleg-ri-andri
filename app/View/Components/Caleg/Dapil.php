<?php

namespace App\View\Components\Caleg;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dapil extends Component
{
    public $data, $kabupatens;

    public function __construct()
    {
        $kabupatenId = [7103, 7104, 7109];
        $this->data = Kecamatan::with('kelurahans', 'daftar_pemilihs', 'calon_pemilihs')
            ->orderByRaw('CASE WHEN kabupaten_id = ' . $kabupatenId[0] . ' THEN 0
                       WHEN kabupaten_id = ' . $kabupatenId[1] . ' THEN 1
                       WHEN kabupaten_id = ' . $kabupatenId[2] . ' THEN 2
                       ELSE 3
                  END')
            ->orderBy('nama')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.caleg.dapil', [
            'data' => $this->data,
        ]);
    }
}
