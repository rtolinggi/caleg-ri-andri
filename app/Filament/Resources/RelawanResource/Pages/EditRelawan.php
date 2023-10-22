<?php

namespace App\Filament\Resources\RelawanResource\Pages;

use App\Filament\Resources\RelawanResource;
use App\Models\Relawan;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelawan extends EditRecord
{
    public $idRecord;

    protected static string $resource = RelawanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('daftar_rekrutmen')
                ->label('Cetak Rekrutmen')
                ->color('secondary')
                ->icon('heroicon-s-printer')
                ->url(route('admin.daftar-rekrutmen', ['relawan_id' => $this->record->id]))
                ->openUrlInNewTab(),

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
        return Relawan::findOrFail($this->idRecord)->nama;
    }
}
