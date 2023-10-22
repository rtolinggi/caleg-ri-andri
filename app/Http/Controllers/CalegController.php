<?php

namespace App\Http\Controllers;

use App\Charts\PerbandinganTargetRealCountChart;
use App\Charts\PerkembanganCalonPemilihChart;
use Illuminate\Http\Request;

class CalegController extends Controller
{
    public function home()
    {
        return view('caleg.home');
    }

    public function chart(PerkembanganCalonPemilihChart $chart1, PerbandinganTargetRealCountChart $chart2)
    {
        return view(
            'caleg.chart',
            [
                'chart1' => $chart1->build(),
                'chart2' => $chart2->build(),
            ]
        );
    }

    public function relawan()
    {
        return view('caleg.relawan');
    }

    public function pemilih()
    {
        return view('caleg.pemilih');
    }
}
