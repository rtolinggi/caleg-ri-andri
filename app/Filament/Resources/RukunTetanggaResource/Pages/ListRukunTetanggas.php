<?php

namespace App\Filament\Resources\RukunTetanggaResource\Pages;

use App\Filament\Resources\RukunTetanggaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRukunTetanggas extends ListRecords
{
    protected static string $resource = RukunTetanggaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
