<?php

namespace App\Filament\Resources\PendidikanResource\Pages;

use App\Filament\Resources\PendidikanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendidikans extends ListRecords
{
    protected static string $resource = PendidikanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
