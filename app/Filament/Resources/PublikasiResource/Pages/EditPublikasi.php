<?php

namespace App\Filament\Resources\PublikasiResource\Pages;

use App\Filament\Resources\PublikasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublikasi extends EditRecord
{
    protected static string $resource = PublikasiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
