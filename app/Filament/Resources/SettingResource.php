<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $modelLabel = 'Pengaturan';

    protected static ?string $pluralModelLabel = 'Pengaturan';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 2;

    protected ?int $itemId = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Pengaturan')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->label('Key')
                            ->disabled(),

                        static::customFormComponentForValue(),
                    ])
            ]);
    }

    public static function customFormComponentForValue()
    {

        if (!request()->routeIs('filament.resources.settings.edit')) {
            return Forms\Components\RichEditor::make('value')
                ->disableToolbarButtons([
                    'attachFiles',
                    'codeBlock',
                    'link',
                    'strike',
                ])
                ->label('Description')
                ->required()
                ->columnSpanFull();
        } else {
            $id = request()->segment(3);
            $setting = Setting::findOrFail($id);

            if (in_array($setting->key, ['Visi', 'Misi'])) {
                return Forms\Components\RichEditor::make('value')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'link',
                        'strike',
                    ])
                    ->label('Description')
                    ->required()
                    ->columnSpanFull();
            }

            if (in_array($setting->key, ['Facebook', 'Instagram', 'Youtube'])) {
                return Forms\Components\TextInput::make('value')
                    ->url()
                    ->prefixIcon('heroicon-s-link')
                    ->label('Link')
                    ->required()
                    ->columnSpanFull();
            }

            if (in_array($setting->key, ['Email'])) {
                return Forms\Components\TextInput::make('value')
                    ->email()
                    ->prefixIcon('heroicon-s-mail')
                    ->label('Email')
                    ->required()
                    ->columnSpanFull();
            }

            if (in_array($setting->key, ['No_Handphone'])) {
                return Forms\Components\TextInput::make('value')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->prefixIcon('heroicon-s-phone')
                    ->label('No. Handphone')
                    ->required()
                    ->columnSpanFull();
            }

            if (in_array($setting->key, ['Alamat', 'Tingkat', 'Dapil', 'Title_Website', 'Copywriting'])) {
                return Forms\Components\TextInput::make('value')
                    ->label('Value')
                    ->required()
                    ->columnSpanFull();
            }
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->wrap(),

                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
