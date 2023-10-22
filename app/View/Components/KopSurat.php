<?php

namespace App\View\Components;

use App\Models\Media;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KopSurat extends Component
{
    public $title_website, $no_handphone, $email, $location, $dapil, $logo_web;

    public function __construct()
    {
        $this->title_website = Setting::where('key', 'Title_Website')->firstOrFail()->value;
        $this->no_handphone = Setting::where('key', 'No_Handphone')->firstOrFail()->value;
        $this->email = Setting::where('key', 'Email')->firstOrFail()->value;
        $this->location = Setting::where('key', 'Alamat')->firstOrFail()->value;
        $this->dapil = Setting::where('key', 'Dapil')->firstOrFail()->value;
        $this->logo_web = Media::where('title', 'Logo Web')->firstOrFail()->image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kop-surat');
    }
}
