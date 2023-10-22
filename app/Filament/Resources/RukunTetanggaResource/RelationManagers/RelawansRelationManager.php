<?php

namespace App\Filament\Resources\RukunTetanggaResource\RelationManagers;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\Relawan;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RelawansRelationManager extends RelationManager
{
    protected static string $relationship = 'relawans';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = 'Relawan';

    protected static ?string $pluralModelLabel = 'Relawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('jenjang')
                    ->enum([
                        'KECAMATAN' => 'KECAMATAN',
                        'KELURAHAN' => 'KELURAHAN',
                        'RT' => 'RT'
                    ])
                    ->colors([
                        'success' => 'KECAMATAN',
                        'warning' => 'KELURAHAN',
                        'danger' => 'RT',
                    ]),

                Tables\Columns\BadgeColumn::make('tipe')
                    ->enum([
                        'Inti' => 'Inti',
                        'Tambahan' => 'Tambahan',
                    ])
                    ->colors([
                        'primary' => 'Inti',
                        'secondary' => 'Tambahan',
                    ]),

                Tables\Columns\TextColumn::make('calon_pemilihs_count')
                    ->alignRight()
                    ->sortable()
                    ->label('Total Rekrutmen')
                    ->counts('calon_pemilihs')
            ])
            ->defaultSort('created_at', 'DESC')
            ->filters([
                Tables\Filters\SelectFilter::make('jenjang')
                    ->label('Jenjang')
                    ->options([
                        'KECAMATAN' => 'KECAMATAN',
                        'KELURAHAN' => 'KELURAHAN',
                        'RT' => 'RT',
                    ]),

                Tables\Filters\SelectFilter::make('tipe')
                    ->label('Tipe')
                    ->options([
                        'Inti' => 'Inti',
                        'Tambahan' => 'Tambahan',
                    ])
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
        return fn (Relawan $record): string => route('filament.resources.relawans.edit', $record);
    }

    protected function getTableHeaderActions(): array
    {
        return [
            FilamentExportHeaderAction::make('Export')
                ->disableAdditionalColumns()
                ->disableFilterColumns()
                ->withColumns([
                    Tables\Columns\TextColumn::make('rukun_tetangga.nama')->label('RT'),
                    Tables\Columns\TextColumn::make('kelurahan.nama')->label('Kelurahan'),
                    Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                ]),
        ];
    }
}
