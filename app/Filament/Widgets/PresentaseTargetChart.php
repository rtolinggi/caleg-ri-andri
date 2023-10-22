<?php

namespace App\Filament\Widgets;

use App\Models\DaftarPemilih;
use App\Models\RukunTetangga;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class PresentaseTargetChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'presentaseTargetChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Calon Pemilih By Target';

    protected static ?int $sort = 2;

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $value = DaftarPemilih::where('is_calon', true)->count();
        $total = RukunTetangga::sum('target_pemilih');

        $persen = persen($value, $total);

        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 300,
            ],
            'series' => [$persen],
            'plotOptions' => [
                'radialBar' => [
                    'hollow' => [
                        'size' => '70%',
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'show' => true,
                            'color' => '#9ca3af',
                            'fontWeight' => 600,
                        ],
                        'value' => [
                            'show' => true,
                            'color' => '#9ca3af',
                            'fontWeight' => 600,
                            'fontSize' => '20px',
                        ],
                    ],

                ],
            ],
            'stroke' => [
                'lineCap' => 'round',
            ],
            'labels' => ['Presentase'],
            'colors' => ['#14b8a6'],
        ];
    }
}
