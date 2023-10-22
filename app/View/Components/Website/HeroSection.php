<?php

namespace App\View\Components\Website;

use App\Models\Media;
use App\Models\RiwayatHidup;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
{
    public $nama_lengkap, $copywriting, $banner;

    public function __construct()
    {
        $this->nama_lengkap = RiwayatHidup::where('key', 'Nama_Lengkap')->firstOrFail()->value;
        $this->copywriting = Setting::where('key', 'Copywriting')->firstOrFail()->value;
        $this->banner = Media::where('title', 'Banner Image')->firstOrFail()->image;
    }

    public function render(): View|Closure|string
    {
        return view('components.website.hero-section');
    }
}
