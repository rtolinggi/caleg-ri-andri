<?php

namespace App\Filament\Resources\PublikasiResource\Pages;

use App\Filament\Resources\PublikasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublikasis extends ListRecords
{
    protected static string $resource = PublikasiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
