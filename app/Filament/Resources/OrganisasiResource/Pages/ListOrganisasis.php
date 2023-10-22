<?php

namespace App\Filament\Resources\OrganisasiResource\Pages;

use App\Filament\Resources\OrganisasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganisasis extends ListRecords
{
    protected static string $resource = OrganisasiResource::class;

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
