<?php

namespace App\Filament\Resources\KelurahanResource\Pages;

use App\Filament\Resources\KelurahanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelurahan extends CreateRecord
{
    protected static string $resource = KelurahanResource::class;

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
