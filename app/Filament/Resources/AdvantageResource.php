<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvantageResource\Pages;
use App\Filament\Resources\AdvantageResource\RelationManagers;
use App\Models\Advantage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvantageResource extends Resource
{
    protected static ?string $model = Advantage::class;

    protected static ?string $navigationIcon = 'heroicon-o-thumb-up';
    protected static ?string $modelLabel = 'Преимущества';
    protected static ?string $pluralModelLabel = 'Преимущества';
    protected static ?string $navigationLabel = 'Преимущества';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationGroup = 'О компании';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('text')
                    ->label('Текст')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('text')
                    ->label('Преимущество')
                    ->limit(80),
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
            'index' => Pages\ListAdvantages::route('/'),
            'create' => Pages\CreateAdvantage::route('/create'),
            'edit' => Pages\EditAdvantage::route('/{record}/edit'),
        ];
    }
}
