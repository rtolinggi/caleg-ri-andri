<?php

namespace App\View\Components\Website;

use App\Models\JejakDigital;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JejakDigitalSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = JejakDigital::latest()->get();

        return view('components.website.jejak-digital-section', compact('data'));
    }
}
