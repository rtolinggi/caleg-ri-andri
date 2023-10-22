<?php

namespace App\Filament\Resources\KabupatenResource\Pages;

use App\Filament\Resources\KabupatenResource;
use App\Models\Kabupaten;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKabupaten extends EditRecord
{
    public $idRecord;

    protected static string $resource = KabupatenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();

        $this->idRecord = $record;
    }

    protected function getHeading(): string
    {
        $name = Kabupaten::findOrFail($this->idRecord)->nama;
        return 'KAB. ' . $name;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
    }
}
