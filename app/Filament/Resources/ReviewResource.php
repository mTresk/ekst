<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-alt';
    protected static ?string $modelLabel = 'Отзывы';
    protected static ?string $pluralModelLabel = 'Отзывы';
    protected static ?string $navigationLabel = 'Отзывы';
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationGroup = 'О компании';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Имя/компания')
                    ->columnSpan(2),
                Textarea::make('text')
                    ->required()
                    ->maxLength(65535)
                    ->label('Текст отзыва')
                    ->columnSpan(2),
                DatePicker::make('created_at')
                    ->label('Дата отзыва')
                    ->required(),
                Toggle::make('is_published')
                    ->label('Опубликован')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя/компания'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d.m.Y')
                    ->label('Дата')
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('Опубликован')
                    ->sortable(),
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
