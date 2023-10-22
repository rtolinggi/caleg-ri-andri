<?php

namespace App\View\Components\Caleg;

use App\Models\Kecamatan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dapil extends Component
{
    public $data;

    public function __construct()
    {
        $this->data = Kecamatan::with('rukun_tetanggas', 'daftar_pemilihs', 'calon_pemilihs')
            ->orderBy('nama')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.caleg.dapil', [
            'data' => $this->data
        ]);
    }
}
