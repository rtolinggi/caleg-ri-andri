<?php

namespace App\View\Components\Website;

use App\Models\Publikasi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PublikasiSection extends Component
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
        $data = Publikasi::latest()->get();

        return view('components.website.publikasi-section', compact('data'));
    }
}
