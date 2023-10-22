<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\RelawanResource\Pages;
use App\Filament\Resources\RelawanResource\RelationManagers;
use App\Models\Kecamatan;
use App\Models\Relawan;
use App\Models\RukunTetangga;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RelawanResource extends Resource
{
    protected static ?string $model = Relawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $modelLabel = 'Relawan';

    protected static ?string $pluralModelLabel = 'Relawan';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 5;

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
                                Forms\Components\TextInput::make('nik')
                                    ->label('NIK')
                                    ->numeric()
                                    ->minLength(16)
                                    ->maxLength(16)
                                    ->unique(ignoreRecord: true)
                                    ->required(),

                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama')
                                    ->required()
                                    ->maxLength(100),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Radio::make('jenjang')
                                            ->label('Jenjang Relawan')
                                            ->required()
                                            ->options([
                                                'KECAMATAN' => 'KECAMATAN',
                                                'KELURAHAN' => 'KELURAHAN',
                                                'RT' => 'RT'
                                            ]),

                                        Forms\Components\Radio::make('tipe')
                                            ->label('Tipe Relawan')
                                            ->required()
                                            ->options([
                                                'Inti' => 'Inti',
                                                'Tambahan' => 'Tambahan',
                                            ]),
                                    ]),

                                Forms\Components\TextInput::make('phone')
                                    ->label('No. HP')
                                    ->required()
                                    ->maxLength(15),

                                Forms\Components\FileUpload::make('file_identitas')
                                    ->label('File Identitas')
                                    ->image()
                                    ->enableDownload()
                                    ->maxSize(1024),
                            ]),

                        Forms\Components\Section::make('Area/Wilayah')
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
                                    ->preload(),

                                Forms\Components\Select::make('rukun_tetangga_id')
                                    ->label('Rukun Tetangga')
                                    ->options(function (Closure $get) {
                                        if ($get('kelurahan_id')) {
                                            return RukunTetangga::where('kelurahan_id', $get('kelurahan_id'))
                                                ->pluck('nama', 'id')->toArray();
                                        }

                                        return null;
                                    })
                                    ->searchable()
                                    ->preload(),
                            ])
                    ]),
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
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                // FilamentExportHeaderAction::make('export')
                //     ->withColumns([
                //         Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                //         Tables\Columns\TextColumn::make('kelurahan.nama')->label('Kelurahan'),
                //         Tables\Columns\TextColumn::make('rukun_tetangga.nama')->label('RT'),
                //     ]),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export')
                //     ->withColumns([
                //         Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                //         Tables\Columns\TextColumn::make('kelurahan.nama')->label('Kelurahan'),
                //         Tables\Columns\TextColumn::make('rukun_tetangga.nama')->label('RT'),
                //     ]),
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
            'index' => Pages\ListRelawans::route('/'),
            'create' => Pages\CreateRelawan::route('/create'),
            'edit' => Pages\EditRelawan::route('/{record}/edit'),
        ];
    }
}
