<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KabupatenResource\Pages;
use App\Filament\Resources\KabupatenResource\RelationManagers;
use App\Models\Kabupaten;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KabupatenResource extends Resource
{
    protected static ?string $model = Kabupaten::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $modelLabel = 'Kabupaten';

    protected static ?string $pluralModelLabel = 'Kabupaten';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 1;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Data')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama'),

                Tables\Columns\BadgeColumn::make('kecamatans_count')
                    ->sortable()
                    ->color('primary')
                    ->label('Kecamatan')
                    ->counts('kecamatans'),

                Tables\Columns\BadgeColumn::make('kelurahans_count')
                    ->sortable()
                    ->color('success')
                    ->label('Kelurahan')
                    ->counts('kelurahans'),

                Tables\Columns\BadgeColumn::make('pemungutan_suaras_count')
                    ->sortable()
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
                Tables\Columns\BadgeColumn::make('kelurahans_sum_target_pemilih')
                    ->color('primary')
                    ->sum('kelurahans', 'target_pemilih')
                    ->label('Target Pemilih'),
            ])
            ->defaultSort('nama', 'ASC')
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KelurahansRelationManager::class,
            RelationManagers\KecamatansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKabupatens::route('/'),
            'create' => Pages\CreateKabupaten::route('/create'),
            'edit' => Pages\EditKabupaten::route('/{record}/edit'),
        ];
    }
}
