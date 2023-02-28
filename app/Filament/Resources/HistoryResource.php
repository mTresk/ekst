<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryResource\Pages;
use App\Filament\Resources\HistoryResource\RelationManagers;
use App\Models\History;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoryResource extends Resource
{
    protected static ?string $model = History::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'История';
    protected static ?string $pluralModelLabel = 'История';
    protected static ?string $navigationLabel = 'История';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationGroup = 'О компании';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('period')
                    ->label('Этапы в истории')
                    ->schema([
                        TextInput::make('year')
                            ->label('Год')
                            ->required(),
                        Textarea::make('event')
                            ->label('Событие')
                            ->required(),
                    ])
                    ->orderable()
                    ->collapsible()
                    ->collapsed()
                    ->createItemButtonLabel('Добавить период')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('period.year')
                    ->label('История'),
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
            'index' => Pages\ListHistories::route('/'),
            'create' => Pages\CreateHistory::route('/create'),
            'edit' => Pages\EditHistory::route('/{record}/edit'),
        ];
    }
}
