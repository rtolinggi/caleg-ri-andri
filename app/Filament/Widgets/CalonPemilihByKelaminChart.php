<?php

namespace App\Filament\Widgets;

use App\Models\DaftarPemilih;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CalonPemilihByKelaminChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'calonPemilihByKelaminChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Calon Pemilih By Kelamin';

    protected static ?int $sort = 4;

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => [
                DaftarPemilih::where('is_calon', true)->where('jenis_kelamin', 'PRIA')->count(),
                DaftarPemilih::where('is_calon', true)->where('jenis_kelamin', 'WANITA')->count(),
            ],
            'labels' => ['PRIA', 'WANITA'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
            'colors' => ['#0284c7', '#fb7185'],
        ];
    }
}
