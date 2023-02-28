<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LiquidResource\Pages;
use App\Filament\Resources\LiquidResource\RelationManagers;
use App\Models\Liquid;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LiquidResource extends Resource
{
    protected static ?string $model = Liquid::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $modelLabel = 'Чернила и жидкости';
    protected static ?string $pluralModelLabel = 'Чернила и жидкости';
    protected static ?string $navigationLabel = 'Чернила и жидкости';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Сервис';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Наименование')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Описание')
                    ->required()
                    ->maxLength(65535),
                SpatieMediaLibraryFileUpload::make('liquid')
                    ->image()
                    ->collection('liquids')
                    ->label('Изображение'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('liquid')
                    ->collection('liquids')
                    ->label('Изображение'),
                TextColumn::make('name')
                    ->label('Наименование'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLiquids::route('/'),
            'create' => Pages\CreateLiquid::route('/create'),
            'edit' => Pages\EditLiquid::route('/{record}/edit'),
        ];
    }
}
