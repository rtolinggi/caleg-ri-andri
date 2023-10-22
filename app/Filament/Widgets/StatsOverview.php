<?php

namespace App\Filament\Widgets;

use App\Models\DaftarPemilih;
use App\Models\PemungutanSuara;
use App\Models\RukunTetangga;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total DPT', number_format(DaftarPemilih::count(), 0, ',', '.')),
            Card::make('Target Pemilih', number_format(RukunTetangga::sum('target_pemilih'), 0, ',', '.')),
            Card::make('Calon Pemilih', number_format(DaftarPemilih::where('is_calon', true)->count(), 0, ',', '.')),
            Card::make('Real Count', number_format(PemungutanSuara::sum('jumlah_suara'), 0, ',', '.')),
        ];
    }
}
