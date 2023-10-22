<?php

namespace App\Filament\Resources\PemungutanSuaraResource\Pages;

use App\Filament\Resources\PemungutanSuaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePemungutanSuara extends CreateRecord
{
    protected static string $resource = PemungutanSuaraResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
    }
}
