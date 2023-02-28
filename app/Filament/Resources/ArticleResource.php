<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'Статьи';
    protected static ?string $pluralModelLabel = 'Статьи';
    protected static ?string $navigationLabel = 'Статьи';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Блог';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                        if (!$get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->label('Заголовок')
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
                TinyEditor::make('content')
                    ->columnSpan(2)
                    ->label('Контент')
                    ->hint('Текст, фото и т.д.')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('article')
                    ->image()
                    ->collection('articles')
                    ->label('Основное изображение')
                    ->required(),
                DateTimePicker::make('published_at')
                    ->label('Дата публикации')
                    ->required(),
                Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('article')
                    ->collection('articles')
                    ->label('Изображение'),
                TextColumn::make('title')
                    ->label('Заголовок'),
                TextColumn::make('published_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->label('Дата публикации'),
            ])->defaultSort('published_at', 'desc')
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
