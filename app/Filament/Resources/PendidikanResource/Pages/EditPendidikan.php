<?php

namespace App\Filament\Resources\PendidikanResource\Pages;

use App\Filament\Resources\PendidikanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendidikan extends EditRecord
{
    protected static string $resource = PendidikanResource::class;

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
