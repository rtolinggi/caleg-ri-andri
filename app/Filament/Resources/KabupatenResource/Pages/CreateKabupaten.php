<?php

namespace App\Filament\Resources\KabupatenResource\Pages;

use App\Filament\Resources\KabupatenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKabupaten extends CreateRecord
{
    protected static string $resource = KabupatenResource::class;

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
