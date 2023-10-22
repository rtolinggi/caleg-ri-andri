<?php

namespace App\Filament\Resources\RelawanResource\Pages;

use App\Filament\Resources\RelawanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRelawan extends CreateRecord
{
    protected static string $resource = RelawanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
    }
}
