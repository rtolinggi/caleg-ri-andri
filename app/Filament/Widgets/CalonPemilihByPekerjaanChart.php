<?php

namespace App\Filament\Widgets;

use App\Models\DaftarPemilih;
use App\Models\Kabupaten;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CalonPemilihByPekerjaanChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'calonPemilihByPekerjaanChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Calon Pemilih Berdasarkan Pekerjaan';

    protected static ?int $sort = 6;

    protected int | string | array $columnSpan = 'full';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getFormSchema(): array
    {
        return [
            Select::make('kabupaten_id')
                ->label('Kabupaten')
                ->searchable()
                ->preload()
                ->options(Kabupaten::all()->pluck('nama', 'id'))
        ];
    }
    protected function getOptions(): array
    {
        $data = [];
        $kabupaten_id = $this->filterFormData['kabupaten_id'];

        if (is_null($kabupaten_id)) {
            $data = [
                DaftarPemilih::where('pekerjaan', 'PEDAGANG')->count(),
                DaftarPemilih::where('pekerjaan', 'NELAYAN')->count(),
                DaftarPemilih::where('pekerjaan', 'PNS')->count(),
                DaftarPemilih::where('pekerjaan', 'BUMN/BUMD')->count(),
                DaftarPemilih::where('pekerjaan', 'SWASTA')->count(),
                DaftarPemilih::where('pekerjaan', 'IRT')->count(),
                DaftarPemilih::where('pekerjaan', 'LAIN-LAIN')->count(),
            ];
        } else {
            $data = [
                DaftarPemilih::where('pekerjaan', 'PEDAGANG')->where('kabupaten_id', $kabupaten_id)->count(),
                DaftarPemilih::where('pekerjaan', 'NELAYAN')->where('kabupaten_id', $kabupaten_id)->count(),
                DaftarPemilih::where('pekerjaan', 'PNS')->where('kabupaten_id', $kabupaten_id)->count(),
                DaftarPemilih::where('pekerjaan', 'BUMN/BUMD')->where('kabupaten_id', $kabupaten_id)->count(),
                DaftarPemilih::where('pekerjaan', 'SWASTA')->where('kabupaten_id', $kabupaten_id)->count(),
                DaftarPemilih::where('pekerjaan', 'IRT')->where('kabupaten_id', $kabupaten_id)->count(),
                DaftarPemilih::where('pekerjaan', 'LAIN-LAIN')->where('kabupaten_id', $kabupaten_id)->count(),
            ];
        }


        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    // 'name' => 'CalonPemilihByPekerjaanChart',
                    'data' => $data,
                ],
            ],
            'xaxis' => [
                'categories' => ['Pedagang', 'Nelayan', 'PNS', 'BUMN/BUMD', 'Swasta', 'IRT', 'Lain-Lain'],
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
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
            'colors' => ['#6366f1'],
        ];
    }
}
