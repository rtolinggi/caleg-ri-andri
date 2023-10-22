<?php

namespace App\Filament\Resources\JejakDigitalResource\Pages;

use App\Filament\Resources\JejakDigitalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJejakDigital extends EditRecord
{
    protected static string $resource = JejakDigitalResource::class;

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
