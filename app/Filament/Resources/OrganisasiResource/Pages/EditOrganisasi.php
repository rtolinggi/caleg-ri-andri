<?php

namespace App\Filament\Resources\OrganisasiResource\Pages;

use App\Filament\Resources\OrganisasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganisasi extends EditRecord
{
    protected static string $resource = OrganisasiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
