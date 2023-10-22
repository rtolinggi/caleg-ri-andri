<?php

namespace App\Filament\Resources\PublikasiResource\Pages;

use App\Filament\Resources\PublikasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePublikasi extends CreateRecord
{
    protected static string $resource = PublikasiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
