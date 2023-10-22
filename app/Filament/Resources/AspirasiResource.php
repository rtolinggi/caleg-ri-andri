<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspirasiResource\Pages;
use App\Filament\Resources\AspirasiResource\RelationManagers;
use App\Models\Aspirasi;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AspirasiResource extends Resource
{
    protected static ?string $model = Aspirasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-annotation';

    protected static ?string $modelLabel = 'Aspirasi';

    protected static ?string $pluralModelLabel = 'Aspirasi';

    // protected static ?string $navigationGroup = 'Utama';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 7;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('no_hp')
                    ->label('No. HP')
                    ->required()
                    ->maxLength(15),

                Forms\Components\Textarea::make('aspirasi')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(15),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_hp')
                    ->copyable()
                    ->copyMessage('No. HP Copied')
                    ->wrap()
                    ->label('No. HP'),

                Tables\Columns\TextColumn::make('aspirasi')
                    ->wrap(),
            ])
            ->defaultSort('created_at', 'DESC')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAspirasis::route('/'),
            'create' => Pages\CreateAspirasi::route('/create'),
            'view' => Pages\ViewAspirasi::route('/{record}'),
            'edit' => Pages\EditAspirasi::route('/{record}/edit'),
        ];
    }
}
