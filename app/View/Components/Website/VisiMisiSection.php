<?php

namespace App\View\Components\Website;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VisiMisiSection extends Component
{
    public $visi, $misi;

    public function __construct()
    {
        $this->visi = Setting::where('key', 'visi')->firstOrFail()->value;
        $this->misi = Setting::where('key', 'misi')->firstOrFail()->value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.visi-misi-section');
    }
}
