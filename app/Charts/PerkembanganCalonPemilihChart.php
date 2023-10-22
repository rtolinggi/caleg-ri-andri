<?php

namespace App\Charts;

use App\Models\DaftarPemilih;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PerkembanganCalonPemilihChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $data = Trend::query(DaftarPemilih::where('is_calon', true))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return $this->chart->areaChart()
            ->setTitle('Perkembangan Calon Pemilih')
            ->setColors(['#6366f1'])
            ->addData('Jumlah Rekrutmen', $data->map(fn (TrendValue $value) => $value->aggregate)->toArray())
            ->setXAxis($data->map(fn (TrendValue $value) => $this->namaBulan(intval(substr($value->date, 5, 2))))->toArray());
    }

    public function namaBulan($month)
    {
        // membuat array bulan
        $months = array(
            1 => "Jan",
            2 => "Feb",
            3 => "Mar",
            4 => "Apr",
            5 => "Mei",
            6 => "Jun",
            7 => "Jul",
            8 => "Agu",
            9 => "Sep",
            10 => "Okt",
            11 => "Nov",
            12 => "Des"
        );

        return $months[$month];
    }
}
