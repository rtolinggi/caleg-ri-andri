<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\RukunTetanggaResource\Pages;
use App\Filament\Resources\RukunTetanggaResource\RelationManagers;
use App\Models\Kecamatan;
use App\Models\RukunTetangga;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RukunTetanggaResource extends Resource
{
    protected static ?string $model = RukunTetangga::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    protected static ?string $modelLabel = 'Rukun Tetangga';

    protected static ?string $pluralModelLabel = 'Rukun Tetangga';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 3;

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
                            ->columnSpanFull()
                            ->maxLength(100),

                        Forms\Components\Select::make('kecamatan_id')
                            ->label('Kecamatan')
                            ->relationship('kecamatan', 'nama')
                            ->reactive()
                            ->afterStateUpdated(fn (Closure $set) => $set('kelurahan_id', null))
                            ->required(),

                        Forms\Components\Select::make('kelurahan_id')
                            ->label('Kelurahan')
                            ->options(function (Closure $get) {
                                if ($get('kecamatan_id')) {
                                    return Kecamatan::find($get('kecamatan_id'))->kelurahans->pluck('nama', 'id');
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
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->searchable()
                    ->label('Kecamatan'),

                Tables\Columns\TextColumn::make('kelurahan.nama')
                    ->searchable()
                    ->label('Kelurahan'),

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
                    ->label('Target')
                    ->color('secondary')
                    ->sortable(),

            ])
            ->defaultSort('created_at', 'DESC')
            ->filters([
                Tables\Filters\SelectFilter::make('kelurahan_id')
                    ->label('Kelurahan')
                    ->relationship('kelurahan', 'nama')
                    ->searchable()
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                // FilamentExportHeaderAction::make('export'),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RelawansRelationManager::class,
            RelationManagers\DaftarPemilihsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRukunTetanggas::route('/'),
            'create' => Pages\CreateRukunTetangga::route('/create'),
            'edit' => Pages\EditRukunTetangga::route('/{record}/edit'),
        ];
    }
}
