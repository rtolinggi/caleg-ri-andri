<?php

namespace App\View\Components\Website;

use App\Models\Media;
use App\Models\RiwayatHidup;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileSection extends Component
{
    public $nama_lengkap, $avatar_image, $tingkat, $dapil, $facebook, $instagram, $youtube, $avatar;

    public function __construct()
    {
        $this->nama_lengkap = RiwayatHidup::where('key', 'Nama_Lengkap')->firstOrFail()->value;
        $this->tingkat      = Setting::where('key', 'Tingkat')->firstOrFail()->value;
        $this->dapil        = Setting::where('key', 'Dapil')->firstOrFail()->value;
        $this->facebook     = Setting::where('key', 'Facebook')->firstOrFail()->value;
        $this->instagram    = Setting::where('key', 'Instagram')->firstOrFail()->value;
        $this->youtube      = Setting::where('key', 'Youtube')->firstOrFail()->value;
        $this->avatar       = Media::where('title', 'Avatar Image')->firstOrFail()->image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.profile-section');
    }
}
