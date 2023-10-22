<?php

namespace App\View\Components\Website;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KontakSection extends Component
{
    public $no_handphone, $email, $location;

    public function __construct()
    {
        $this->no_handphone = Setting::where('key', 'No_Handphone')->firstOrFail()->value;
        $this->email = Setting::where('key', 'Email')->firstOrFail()->value;
        $this->location = Setting::where('key', 'Alamat')->firstOrFail()->value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.kontak-section');
    }
}
