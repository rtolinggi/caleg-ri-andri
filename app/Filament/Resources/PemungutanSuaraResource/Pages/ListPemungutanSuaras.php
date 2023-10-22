<?php

namespace App\Filament\Resources\PemungutanSuaraResource\Pages;

use App\Filament\Resources\PemungutanSuaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemungutanSuaras extends ListRecords
{
    protected static string $resource = PemungutanSuaraResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
