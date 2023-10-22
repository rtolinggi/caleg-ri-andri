<?php

namespace App\Charts;

use App\Models\Kelurahan;
use App\Models\PemungutanSuara;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PerbandinganTargetRealCountChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        return $this->chart->polarAreaChart()
            ->setTitle('Perbandingan Pemilih')
            ->addData([
                PemungutanSuara::sum('jumlah_suara'),
                Kelurahan::sum('target_pemilih'),
            ])
            ->setLabels(['Real Count', 'Target'])
            ->setColors(['#f59e0b', '#14b8a6']);
    }
}
