<?php

namespace App\Filament\Resources\DaftarPemilihResource\Pages;

use App\Filament\Resources\DaftarPemilihResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarPemilihs extends ListRecords
{
    protected static string $resource = DaftarPemilihResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\Action::make('cek_dpt')
                ->label('Cek DPT')
                ->color('secondary')
                ->icon('heroicon-s-clipboard-check')
                ->url('https://cekdptonline.kpu.go.id/')
                ->openUrlInNewTab(),

            Actions\Action::make('cetak_formulir')
                ->label('Cetak Formulir')
                ->color('secondary')
                ->icon('heroicon-s-printer')
                ->url(route('admin.form-calon-pemilih'))
                ->openUrlInNewTab(),
        ];
    }
}
