<?php

namespace App\Filament\Resources\PendidikanResource\Pages;

use App\Filament\Resources\PendidikanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePendidikan extends CreateRecord
{
    protected static string $resource = PendidikanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
