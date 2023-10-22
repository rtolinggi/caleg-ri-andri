<?php

namespace App\Filament\Widgets;

use App\Models\DaftarPemilih;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CalonPemilihByUmurChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'calonPemilihByUmurChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Calon Pemilih By Umur';

    protected static ?int $sort = 5;

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
                'type' => 'bar',
                'height' => 300,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    // 'name' => 'BasicBarChart',
                    'data' => [
                        DaftarPemilih::whereBetween('umur', [17, 40])->where('is_calon', true)->count(),
                        DaftarPemilih::whereBetween('umur', [41, 60])->where('is_calon', true)->count(),
                        DaftarPemilih::where('umur', '>=', 61)->where('is_calon', true)->count(),
                    ],
                ],
            ],
            'xaxis' => [
                'categories' => [
                    '17-40 thn',
                    '41-60 thn',
                    '+60 thn'
                ],
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 500,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 1,
                    'horizontal' => false,
                ],
            ],
        ];
    }
}
