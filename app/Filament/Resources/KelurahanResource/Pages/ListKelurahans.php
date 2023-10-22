<?php

namespace App\Filament\Resources\KelurahanResource\Pages;

use App\Filament\Resources\KelurahanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelurahans extends ListRecords
{
    protected static string $resource = KelurahanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
