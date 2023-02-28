<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'Контакты';
    protected static ?string $pluralModelLabel = 'Контакты';
    protected static ?string $navigationLabel = 'Контакты';
    protected static ?int $navigationSort = 14;
    protected static ?string $navigationGroup = 'Контакты';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('address')
                        ->required()
                        ->maxLength(255)
                        ->label('Адрес'),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->label('Email'),
                    TextInput::make('phone')
                        ->required()
                        ->maxLength(255)
                        ->label('Телефон'),
                    TextInput::make('schedule')
                        ->required()
                        ->maxLength(255)
                        ->label('Время работы'),
                ]),
                Card::make([
                    TextInput::make('vk')
                        ->maxLength(255),
                    TextInput::make('telegram')
                        ->maxLength(255),
                    TextInput::make('whatsapp')
                        ->maxLength(255),
                ]),
                Card::make([
                    Repeater::make('unit')
                        ->label('Отделы')
                        ->schema([
                            TextInput::make('name')
                                ->label('Название отдела'),
                            TextInput::make('phone')
                                ->label('Телефон'),
                            TextInput::make('email')
                                ->label('Email'),
                        ])
                        ->orderable()
                        ->createItemButtonLabel('Добавить отдел'),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('schedule'),
                Tables\Columns\TextColumn::make('vk'),
                Tables\Columns\TextColumn::make('telegram'),
                Tables\Columns\TextColumn::make('whatsapp'),
                Tables\Columns\TextColumn::make('unit'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
