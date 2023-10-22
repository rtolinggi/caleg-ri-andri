<?php

namespace App\Filament\Resources\RelawanResource\RelationManagers;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\DaftarPemilih;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarPemilihsRelationManager extends RelationManager
{
    protected static string $relationship = 'daftar_pemilihs';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = 'Daftar Rekrutmen';

    protected static ?string $pluralModelLabel = 'Daftar Rekrutmen';

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
                    ->wrap()
                    ->label('NIK')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_hp')
                    ->wrap()
                    ->label('No. HP'),

                Tables\Columns\TextColumn::make('pemungutan_suara.nama')
                    ->wrap()
                    ->label('TPS'),

                Tables\Columns\IconColumn::make('is_calon')
                    ->label('Calon Pemilih')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->trueColor('warning')
                    ->falseIcon('heroicon-o-x-circle')
                    ->falseColor('primary'),
            ])
            ->defaultSort('created_at', 'DESC')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_calon')
                    ->label('Calon Pemilih'),

                Tables\Filters\SelectFilter::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'PRIA' => 'PRIA',
                        'WANITA' => 'WANITA',
                    ])
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                // Tables\Actions\Action::make('show')
                //     ->url(fn (DaftarPemilih $record): string => route('filament.resources.daftar-pemilihs.edit', $record))
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (DaftarPemilih $record): string => route('filament.resources.daftar-pemilihs.edit', $record);
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
