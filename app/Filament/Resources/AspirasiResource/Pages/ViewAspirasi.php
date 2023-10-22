<?php

namespace App\Filament\Resources\AspirasiResource\Pages;

use App\Filament\Resources\AspirasiResource;
use App\Models\Aspirasi;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAspirasi extends ViewRecord
{
    public $idRecord;

    protected static string $resource = AspirasiResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }

    public function mount($record): void
    {
        static::authorizeResourceAccess();

        $this->record = $this->resolveRecord($record);

        abort_unless(static::getResource()::canView($this->getRecord()), 403);

        $this->fillForm();

        $this->idRecord = $record;
    }

    protected function getHeading(): string
    {
        return Aspirasi::findOrFail($this->idRecord)->nama;
    }
}
