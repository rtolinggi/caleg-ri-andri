<?php

namespace App\Filament\Resources\KelurahanResource\RelationManagers;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\PemungutanSuara;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemungutanSuarasRelationManager extends RelationManager
{
    protected static string $relationship = 'pemungutan_suaras';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = 'TPS';

    protected static ?string $pluralModelLabel = 'TPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jumlah_suara')
                    ->label('Jumlah Suara')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_lock')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-lock-closed')
                    ->trueColor('primary')
                    ->falseIcon('heroicon-o-lock-open')
                    ->falseColor('secondary'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (PemungutanSuara $record): string => route('filament.resources.pemungutan-suaras.edit', $record);
    }

    protected function getTableHeaderActions(): array
    {
        return [
            FilamentExportHeaderAction::make('Export')
                ->disableAdditionalColumns()
                ->disableFilterColumns()
                ->withColumns([
                    Tables\Columns\TextColumn::make('kelurahan.nama')->label('Kelurahan'),
                    Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                ]),
        ];
    }
}
