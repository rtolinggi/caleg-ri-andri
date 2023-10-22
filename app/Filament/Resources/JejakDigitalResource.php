<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JejakDigitalResource\Pages;
use App\Filament\Resources\JejakDigitalResource\RelationManagers;
use App\Models\JejakDigital;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JejakDigitalResource extends Resource
{
    protected static ?string $model = JejakDigital::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $modelLabel = 'Jejak Digital';

    protected static ?string $pluralModelLabel = 'Jejak Digital';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

                Forms\Components\TextInput::make('publisher')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('date')
                    ->required(),

                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->enableDownload()
                    ->required()
                    ->image()
                    ->maxSize(1024),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto'),

                Tables\Columns\TextColumn::make('title')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('publisher')
                    ->wrap(),

                Tables\Columns\TextColumn::make('date')
                    ->wrap()
                    ->sortable()
                    ->date(),
            ])
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
            'index' => Pages\ListJejakDigitals::route('/'),
            'create' => Pages\CreateJejakDigital::route('/create'),
            'edit' => Pages\EditJejakDigital::route('/{record}/edit'),
        ];
    }
}
