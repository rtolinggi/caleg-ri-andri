<?php

namespace App\Filament\Resources\RelawanResource\Pages;

use App\Filament\Resources\RelawanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRelawans extends ListRecords
{
    protected static string $resource = RelawanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
