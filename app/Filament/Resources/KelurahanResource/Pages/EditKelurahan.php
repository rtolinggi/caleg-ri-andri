<?php

namespace App\Filament\Resources\KelurahanResource\Pages;

use App\Filament\Resources\KelurahanResource;
use App\Models\Kelurahan;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelurahan extends EditRecord
{
    public $idRecord;

    protected static string $resource = KelurahanResource::class;

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
        $name = Kelurahan::findOrFail($this->idRecord)->nama;
        return 'KEL. ' . $name;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
    }
}
