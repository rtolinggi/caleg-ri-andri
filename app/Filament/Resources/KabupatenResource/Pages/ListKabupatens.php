<?php

namespace App\Filament\Resources\KabupatenResource\Pages;

use App\Filament\Resources\KabupatenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKabupatens extends ListRecords
{
    protected static string $resource = KabupatenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
