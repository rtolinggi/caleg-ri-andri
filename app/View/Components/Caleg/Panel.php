<?php

namespace App\View\Components\Caleg;

use App\Models\DaftarPemilih;
use App\Models\PemungutanSuara;
use App\Models\RukunTetangga;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Panel extends Component
{
    public $daftarPemilih, $totalDPT, $target, $suaraTPS;

    public function __construct()
    {
        $this->daftarPemilih = DaftarPemilih::where('is_calon', true)->count();
        $this->totalDPT = DaftarPemilih::count();
        $this->target = RukunTetangga::sum('target_pemilih');
        $this->suaraTPS = PemungutanSuara::sum('jumlah_suara');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.caleg.panel');
    }
}
