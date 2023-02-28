<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Str;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'Программы';
    protected static ?string $pluralModelLabel = 'Программы';
    protected static ?string $navigationLabel = 'Программы';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationGroup = 'Сервис';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                        if (!$get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->label('Название программы')
                    ->reactive()
                    ->required(),
                TextInput::make('slug')
                    ->afterStateUpdated(function (Closure $set) {
                        $set('is_slug_changed_manually', true);
                    })
                    ->label('Ссылка')
                    ->hint('Генерируется автоматически')
                    ->required(),
                Hidden::make('is_slug_changed_manually')
                    ->default(false)
                    ->dehydrated(false),
                Textarea::make('description')
                    ->columnSpan(2)
                    ->label('Краткое описание')
                    ->required(),
                TinyEditor::make('content')
                    ->columnSpan(2)
                    ->label('Контент')
                    ->hint('Таблицы, произвольный текст и т.д.')
                    ->required(),
                Repeater::make('file')
                    ->label('Файлы для скачивания')
                    ->schema([
                        TextInput::make('title')
                            ->label('Название')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('file')
                            ->collection('files')
                            ->label('Файл')
                            ->preserveFilenames(),
                    ])
                    ->orderable()
                    ->createItemButtonLabel('Добавить файл'),
                SpatieMediaLibraryFileUpload::make('program')
                    ->image()
                    ->collection('programs')
                    ->label('Изображение'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('program')
                    ->collection('programs')
                    ->label('Изображение'),
                TextColumn::make('name')
                    ->label('Название'),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
