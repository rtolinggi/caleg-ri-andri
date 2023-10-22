<?php

namespace App\Filament\Resources\KecamatanResource\Pages;

use App\Filament\Resources\KecamatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKecamatans extends ListRecords
{
    protected static string $resource = KecamatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
