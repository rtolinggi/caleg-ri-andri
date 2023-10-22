<?php

namespace App\Filament\Resources\KecamatanResource\RelationManagers;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\Kelurahan;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelurahansRelationManager extends RelationManager
{
    protected static string $relationship = 'kelurahans';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = 'Daftar Kelurahan';

    protected static ?string $pluralModelLabel = 'Daftar Kelurahan';

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
                    ->label('Kelurahan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('rukun_tetanggas_count')
                    ->sortable()
                    ->color('primary')
                    ->label('RT')
                    ->counts('rukun_tetanggas'),

                Tables\Columns\BadgeColumn::make('pemungutan_suaras_count')
                    ->sortable()
                    ->color('success')
                    ->label('TPS')
                    ->counts('pemungutan_suaras'),

                Tables\Columns\BadgeColumn::make('relawans_count')
                    ->sortable()
                    ->color('warning')
                    ->label('Relawan')
                    ->counts('relawans'),

                Tables\Columns\BadgeColumn::make('calon_pemilihs_count')
                    ->sortable()
                    ->color('danger')
                    ->label('Calon Pemilih')
                    ->counts('calon_pemilihs'),
            ])
            ->defaultSort('nama', 'ASC')
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
        return fn (Kelurahan $record): string => route('filament.resources.kelurahans.edit', $record);
    }

    protected function getTableHeaderActions(): array
    {
        return [
            FilamentExportHeaderAction::make('Export')
                ->disableAdditionalColumns()
                ->disableFilterColumns(),
        ];
    }
}
