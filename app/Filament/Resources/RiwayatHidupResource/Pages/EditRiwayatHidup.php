<?php

namespace App\Filament\Resources\RiwayatHidupResource\Pages;

use App\Filament\Resources\RiwayatHidupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiwayatHidup extends EditRecord
{
    protected static string $resource = RiwayatHidupResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
