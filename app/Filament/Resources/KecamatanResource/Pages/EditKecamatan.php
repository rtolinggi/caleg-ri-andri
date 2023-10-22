<?php

namespace App\Filament\Resources\KecamatanResource\Pages;

use App\Filament\Resources\KecamatanResource;
use App\Models\Kecamatan;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKecamatan extends EditRecord
{
    public $idRecord;

    protected static string $resource = KecamatanResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
            // Actions\Action::make('rekap_kecamatan')
            //     ->label('Cetak Rekapan')
            //     ->color('secondary')
            //     ->icon('heroicon-s-printer')
            //     ->url(route('admin.rekap-kecamatan', ['id' => $this->record->id]))
            //     ->openUrlInNewTab(),
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
        $name = Kecamatan::findOrFail($this->idRecord)->nama;
        return 'KEC. ' . $name;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['nama'] = str()->upper($data['nama']);

        return $data;
    }
}
