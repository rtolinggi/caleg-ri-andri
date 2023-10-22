<?php

namespace App\View\Components\Website;

use App\Models\Media;
use App\Models\RiwayatHidup;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AspirasiSection extends Component
{
    public $avatar, $nama, $dapil;

    public function __construct()
    {
        $this->avatar = Media::where('title', 'Avatar Image')->firstOrFail()->image;
        $this->nama   = RiwayatHidup::where('key', 'Nama_Lengkap')->firstOrFail()->value;
        $this->dapil  = Setting::where('key', 'Dapil')->firstOrFail()->value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.aspirasi-section');
    }
}
