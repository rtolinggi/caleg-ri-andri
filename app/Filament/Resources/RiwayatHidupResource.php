<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatHidupResource\Pages;
use App\Filament\Resources\RiwayatHidupResource\RelationManagers;
use App\Models\RiwayatHidup;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiwayatHidupResource extends Resource
{
    protected static ?string $model = RiwayatHidup::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    protected static ?string $modelLabel = 'Riwayat Hidup';

    protected static ?string $pluralModelLabel = 'Riwayat Hidup';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('key')
                    ->disabled(),

                Forms\Components\TextInput::make('value')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->wrap(),

                Tables\Columns\TextColumn::make('value')
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRiwayatHidups::route('/'),
            'create' => Pages\CreateRiwayatHidup::route('/create'),
            'edit' => Pages\EditRiwayatHidup::route('/{record}/edit'),
        ];
    }
}
