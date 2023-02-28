<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NumberResource\Pages;
use App\Filament\Resources\NumberResource\RelationManagers;
use App\Models\Number;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NumberResource extends Resource
{
    protected static ?string $model = Number::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-square-bar';
    protected static ?string $modelLabel = 'Цифры';
    protected static ?string $pluralModelLabel = 'Цифры';
    protected static ?string $navigationLabel = 'Цифры';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationGroup = 'О компании';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')
                    ->required()
                    ->maxLength(255)
                    ->label('Цифра'),
                Forms\Components\Textarea::make('text')
                    ->required()
                    ->maxLength(65535)
                    ->label('Текст'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->label('Цифра'),
                Tables\Columns\TextColumn::make('text')
                    ->label('Текст')
                    ->limit(60),
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
            'index' => Pages\ListNumbers::route('/'),
            'create' => Pages\CreateNumber::route('/create'),
            'edit' => Pages\EditNumber::route('/{record}/edit'),
        ];
    }
}
