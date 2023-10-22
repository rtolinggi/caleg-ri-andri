<?php

namespace App\View\Components\Caleg;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Greeting extends Component
{
    public $waktu;

    public function __construct()
    {
        // Mendapatkan waktu saat ini dalam format jam:menit:detik
        $current_time = date("H:i:s");

        // Memecah waktu menjadi bagian jam
        $current_hour = (int) substr($current_time, 0, 2);

        // Menentukan waktu pagi, siang, atau malam
        if ($current_hour >= 5 && $current_hour < 12) {
            $this->waktu = "Pagi";
        } elseif ($current_hour >= 12 && $current_hour < 18) {
            $this->waktu = "Siang";
        } else {
            $this->waktu = "Malam";
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.caleg.greeting');
    }
}
