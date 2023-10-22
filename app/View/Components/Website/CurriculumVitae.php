<?php

namespace App\View\Components\Website;

use App\Models\Media;
use App\Models\RiwayatHidup;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CurriculumVitae extends Component
{
    public $data;

    public function __construct()
    {
        $this->data = RiwayatHidup::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.curriculum-vitae', ['data' => $this->data]);
    }
}
