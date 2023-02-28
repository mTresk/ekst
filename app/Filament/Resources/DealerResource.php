<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DealerResource\Pages;
use App\Filament\Resources\DealerResource\RelationManagers;
use App\Models\Dealer;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealerResource extends Resource
{
    protected static ?string $model = Dealer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'Дилеры';
    protected static ?string $pluralModelLabel = 'Дилеры';
    protected static ?string $navigationLabel = 'Дилеры';
    protected static ?int $navigationSort = 14;
    protected static ?string $navigationGroup = 'Контакты';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(255)
                    ->label('Название'),
                TextInput::make('address')
                    ->maxLength(255)
                    ->label('Адрес'),
                TextInput::make('phone')
                    ->maxLength(255)
                    ->label('Телефон'),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                TextInput::make('coordinates')
                    ->maxLength(255)
                    ->label('Координаты')
                    ->hint('Получить координаты https://yandex.ru/map-constructor/location-tool/'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название'),
                TextColumn::make('address')
                    ->label('Адрес'),
                TextColumn::make('phone')
                    ->label('Телефон'),
                TextColumn::make('email')
                    ->label('Email'),
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
            'index' => Pages\ListDealers::route('/'),
            'create' => Pages\CreateDealer::route('/create'),
            'edit' => Pages\EditDealer::route('/{record}/edit'),
        ];
    }
}
