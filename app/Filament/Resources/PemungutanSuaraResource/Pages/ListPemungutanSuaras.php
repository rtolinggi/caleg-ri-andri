<?php

namespace App\Filament\Resources\PemungutanSuaraResource\Pages;

use App\Filament\Resources\PemungutanSuaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListPemungutanSuaras extends ListRecords
{
    protected static string $resource = PemungutanSuaraResource::class;

    protected function getActions(): array
    {
        return [
            ImportAction::make()
                ->outlined()
                ->uniqueField('id')
                ->fields([
                    ImportField::make('id')
                        ->required()
                        ->label('ID'),
                    ImportField::make('kabupaten_id')
                        ->required()
                        ->label('ID Kabupaten'),
                    ImportField::make('kecamatan_id')
                        ->required()
                        ->label('ID Kecamatan'),
                    ImportField::make('kelurahan_id')
                        ->required()
                        ->label('ID Kelurahan'),
                    ImportField::make('nama')
                        ->required()
                        ->label('Nama TPS'),
                ]),
            Actions\CreateAction::make(),
        ];
    }
}
