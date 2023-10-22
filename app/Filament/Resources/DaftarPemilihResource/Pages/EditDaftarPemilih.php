<?php

namespace App\Filament\Resources\DaftarPemilihResource\Pages;

use App\Filament\Resources\DaftarPemilihResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarPemilih extends EditRecord
{
    protected static string $resource = DaftarPemilihResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('cek_dpt')
                ->label('Cek DPT')
                ->color('secondary')
                ->icon('heroicon-s-clipboard-check')
                ->url('https://cekdptonline.kpu.go.id/')
                ->openUrlInNewTab(),

            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
    }
}
