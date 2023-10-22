<?php

namespace App\View\Components\Caleg;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavTitle extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.caleg.nav-title');
    }
}
