<?php

namespace App\Filament\Resources\JejakDigitalResource\Pages;

use App\Filament\Resources\JejakDigitalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJejakDigital extends CreateRecord
{
    protected static string $resource = JejakDigitalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
