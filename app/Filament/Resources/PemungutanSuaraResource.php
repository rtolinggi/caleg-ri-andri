<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\PemungutanSuaraResource\Pages;
use App\Filament\Resources\PemungutanSuaraResource\RelationManagers;
use App\Models\Kecamatan;
use App\Models\PemungutanSuara;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemungutanSuaraResource extends Resource
{
    protected static ?string $model = PemungutanSuara::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-in';

    protected static ?string $modelLabel = 'TPS';

    protected static ?string $pluralModelLabel = 'TPS';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 4;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\Section::make('Detail Data')
                            ->collapsible()
                            ->compact()
                            ->columnSpan(7)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama')
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(100),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_suara')
                                            ->label('Jumlah Suara')
                                            ->numeric()
                                            ->default(0)
                                            ->required(),

                                        Forms\Components\Toggle::make('is_lock')
                                            ->label('Status TPS')
                                            ->inline(false)
                                            ->onIcon('heroicon-s-lock-closed')
                                            ->onColor('primary')
                                            ->offIcon('heroicon-s-lock-open')
                                            ->offColor('secondary'),
                                    ]),

                                Forms\Components\FileUpload::make('file_bukti')
                                    ->label('File Bukti')
                                    ->image()
                                    ->enableDownload()
                                    ->maxSize(1024),
                            ]),

                        Forms\Components\Section::make('Area Wilayah')
                            ->collapsible()
                            ->compact()
                            ->columnSpan(5)
                            ->schema([

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
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kelurahan.nama')
                    ->label('Kelurahan'),

                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan'),

                Tables\Columns\BadgeColumn::make('calon_pemilihs_count')
                    ->sortable()
                    ->color('danger')
                    ->label('Calon Pemilih')
                    ->counts('calon_pemilihs'),

                Tables\Columns\BadgeColumn::make('jumlah_suara')
                    ->label('Jumlah Suara')
                    ->color('secondary')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_lock')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-lock-closed')
                    ->trueColor('primary')
                    ->falseIcon('heroicon-o-lock-open')
                    ->falseColor('secondary'),

            ])
            ->defaultSort('kelurahan_id', 'ASC')
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
            RelationManagers\DaftarPemilihsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemungutanSuaras::route('/'),
            'create' => Pages\CreatePemungutanSuara::route('/create'),
            'edit' => Pages\EditPemungutanSuara::route('/{record}/edit'),
        ];
    }
}
