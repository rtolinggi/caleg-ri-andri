<?php

namespace App\Filament\Resources\PemungutanSuaraResource\Pages;

use App\Filament\Resources\PemungutanSuaraResource;
use App\Models\PemungutanSuara;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemungutanSuara extends EditRecord
{
    public $idRecord;

    protected static string $resource = PemungutanSuaraResource::class;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
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
        $name = PemungutanSuara::findOrFail($this->idRecord)->nama;
        return $name;
    }
}
