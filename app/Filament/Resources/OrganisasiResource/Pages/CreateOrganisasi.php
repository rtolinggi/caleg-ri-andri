<?php

namespace App\Filament\Resources\OrganisasiResource\Pages;

use App\Filament\Resources\OrganisasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganisasi extends CreateRecord
{
    protected static string $resource = OrganisasiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
