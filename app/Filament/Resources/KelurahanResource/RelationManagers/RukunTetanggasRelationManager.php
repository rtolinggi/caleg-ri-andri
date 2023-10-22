<?php

namespace App\Filament\Resources\KelurahanResource\RelationManagers;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\RukunTetangga;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RukunTetanggasRelationManager extends RelationManager
{
    protected static string $relationship = 'rukun_tetanggas';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = 'Rukun Tetangga';

    protected static ?string $pluralModelLabel = 'Rukun Tetangga';

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
                    ->label('Nama')
                    ->searchable(),

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

                Tables\Columns\BadgeColumn::make('target_pemilih')
                    ->label('Target Pemilih')
                    ->color('secondary')
                    ->sortable(),
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
        return fn (RukunTetangga $record): string => route('filament.resources.rukun-tetanggas.edit', $record);
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
