<?php

namespace App\Filament\Resources\RiwayatHidupResource\Pages;

use App\Filament\Resources\RiwayatHidupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiwayatHidups extends ListRecords
{
    protected static string $resource = RiwayatHidupResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
