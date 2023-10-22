<?php

namespace App\Filament\Resources\RukunTetanggaResource\Pages;

use App\Filament\Resources\RukunTetanggaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRukunTetangga extends CreateRecord
{
    protected static string $resource = RukunTetanggaResource::class;

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
