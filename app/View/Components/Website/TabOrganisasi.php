<?php

namespace App\View\Components\Website;

use App\Models\Organisasi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabOrganisasi extends Component
{
    public $data;

    public function __construct()
    {
        $this->data = Organisasi::orderBy('tahun', 'DESC')->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.website.tab-organisasi', ['data' => $this->data]);
    }
}
