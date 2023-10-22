<?php

namespace App\Filament\Resources\JejakDigitalResource\Pages;

use App\Filament\Resources\JejakDigitalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJejakDigitals extends ListRecords
{
    protected static string $resource = JejakDigitalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
