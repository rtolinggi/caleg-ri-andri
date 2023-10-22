<?php

namespace App\View\Components\Website;

use App\Models\Pendidikan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabPendidikan extends Component
{
    public $data;

    public function __construct()
    {
        $this->data = Pendidikan::orderBy('tahun', 'DESC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.tab-pendidikan', ['data' => $this->data]);
    }
}
