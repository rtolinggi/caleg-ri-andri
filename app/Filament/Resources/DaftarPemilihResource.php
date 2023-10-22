<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\DaftarPemilihResource\Pages;
use App\Filament\Resources\DaftarPemilihResource\RelationManagers;
use App\Models\DaftarPemilih;
use App\Models\Kecamatan;
use App\Models\PemungutanSuara;
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

class DaftarPemilihResource extends Resource
{
    protected static ?string $model = DaftarPemilih::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $modelLabel = 'Pemilih';

    protected static ?string $pluralModelLabel = 'Pemilih';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 6;

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
                                    ->required(),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('umur')
                                            ->label('Umur')
                                            ->required()
                                            ->numeric()
                                            ->minValue(17)
                                            ->maxValue(100),

                                        Forms\Components\Select::make('jenis_kelamin')
                                            ->label('Jenis Kelamin')
                                            ->required()
                                            ->options([
                                                'PRIA' => 'PRIA',
                                                'WANITA' => 'WANITA'
                                            ]),
                                    ]),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('no_hp')
                                            ->label('No. HP')
                                            ->required()
                                            ->maxLength(15),
                                        Forms\Components\Toggle::make('is_calon')
                                            ->label('Apakah Calon Pemilih ?')
                                            ->inline(false)
                                            ->onIcon('heroicon-s-check-circle')
                                            ->onColor('primary')
                                            ->offIcon('heroicon-s-x-circle')
                                            ->offColor('secondary'),
                                    ]),

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
                                    ->reactive()
                                    ->afterStateUpdated(fn (Closure $set) => $set('rukun_tetangga_id', null))
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

                                Forms\Components\Select::make('pemungutan_suara_id')
                                    ->label('TPS')
                                    ->options(function (Closure $get) {
                                        if ($get('kelurahan_id')) {
                                            return PemungutanSuara::where('kelurahan_id', $get('kelurahan_id'))
                                                ->pluck('nama', 'id')->toArray();
                                        }

                                        return null;
                                    })
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\Select::make('relawan_id')
                                    ->label('Relawan')
                                    ->options(function (callable $get) {
                                        if ($get('kecamatan_id')) {
                                            return Relawan::where('kecamatan_id', ($get('kecamatan_id')))
                                                ->pluck('nama', 'id');
                                        }

                                        return null;
                                    })
                                    ->searchable()
                                    ->preload(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->wrap()
                    ->label('NIK')
                    ->copyable()
                    ->copyMessage('NIK copied')
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

                // Tables\Columns\BadgeColumn::make('jenis_kelamin')
                //     ->label('Kelamin')
                //     ->enum([
                //         'PRIA' => 'PRIA',
                //         'WANITA' => 'WANITA',
                //     ])
                //     ->colors([
                //         'success' => 'PRIA',
                //         'danger' => 'WANITA',
                //     ]),

                // Tables\Columns\TextColumn::make('umur'),

                Tables\Columns\IconColumn::make('is_calon')
                    ->label('Calon Pemilih')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->trueColor('warning')
                    ->falseIcon('heroicon-o-x-circle')
                    ->falseColor('primary'),

                // Tables\Columns\ToggleColumn::make('is_calon')
                //     ->label('Calon Pemilih')
                //     ->onIcon('heroicon-s-check-circle')
                //     ->onColor('primary')
                //     ->offIcon('heroicon-s-x-circle')
                //     ->offColor('secondary'),
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
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                // FilamentExportHeaderAction::make('export')
                //     ->withColumns([
                //         Tables\Columns\TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                //         Tables\Columns\TextColumn::make('umur')->label('Umur'),
                //         Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                //         Tables\Columns\TextColumn::make('kelurahan.nama')->label('Kelurahan'),
                //         Tables\Columns\TextColumn::make('rukun_tetangga.nama')->label('RT'),
                //         Tables\Columns\TextColumn::make('relawan.nama')->label('Relawan'),
                //     ]),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export')
                //     ->withColumns([
                //         Tables\Columns\TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                //         Tables\Columns\TextColumn::make('umur')->label('Umur'),
                //         Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                //         Tables\Columns\TextColumn::make('kelurahan.nama')->label('Kelurahan'),
                //         Tables\Columns\TextColumn::make('rukun_tetangga.nama')->label('RT'),
                //         Tables\Columns\TextColumn::make('relawan.nama')->label('Relawan'),
                //     ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftarPemilihs::route('/'),
            'create' => Pages\CreateDaftarPemilih::route('/create'),
            'edit' => Pages\EditDaftarPemilih::route('/{record}/edit'),
        ];
    }
}
