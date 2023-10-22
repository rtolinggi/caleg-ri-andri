<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\KelurahanResource\Pages;
use App\Filament\Resources\KelurahanResource\RelationManagers;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelurahanResource extends Resource
{
    protected static ?string $model = Kelurahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static ?string $modelLabel = 'Kelurahan';

    protected static ?string $pluralModelLabel = 'Kelurahan';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 2;

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
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\Select::make('kabupaten_id')
                            ->label('Kabupaten')
                            ->relationship('kabupaten', 'nama')
                            ->reactive()
                            ->searchable()
                            ->preload()
                            ->afterStateUpdated(fn (Closure $set) => $set('kecamatan_id', null))
                            ->required(),
                        Forms\Components\Select::make('kecamatan_id')
                            ->label('Kecamatan')
                            ->options(function (Closure $get) {
                                if ($get('kabupaten_id')) {
                                    return Kabupaten::find($get('kabupaten_id'))->kecamatans->pluck('nama', 'id');
                                }
                                return null;
                            })
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('target_pemilih')
                            ->label('Target Pemilih')
                            ->numeric()
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kabupaten.nama')
                    ->label('Kabupaten'),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan'),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
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
            ->defaultSort('kabupaten_id', 'ASC')
            ->filters([
                Tables\Filters\SelectFilter::make('kabupaten_id')
                    ->label('Kabupaten')
                    ->relationship('kabupaten', 'nama'),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                //
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export'),
                // ->disablePreview()
                // ->directDownload(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PemungutanSuarasRelationManager::class,
            RelationManagers\DaftarPemilihsRelationManager::class,
            RelationManagers\RelawansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelurahans::route('/'),
            'create' => Pages\CreateKelurahan::route('/create'),
            'edit' => Pages\EditKelurahan::route('/{record}/edit'),
        ];
    }
}
