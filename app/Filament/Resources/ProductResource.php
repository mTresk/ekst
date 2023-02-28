<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Closure;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'Продукция';
    protected static ?string $pluralModelLabel = 'Продукция';
    protected static ?string $navigationLabel = 'Продукция';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Оборудование';

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
                    ->label('Наименование')
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
                Textarea::make('short_description')
                    ->maxLength(65535)
                    ->label('Короткое описание')
                    ->hint('Буквально пару строк')
                    ->columnSpan(2),
                Textarea::make('description')
                    ->columnSpan(2)
                    ->label('Основное описание')
                    ->required(),
                TinyEditor::make('content')
                    ->columnSpan(2)
                    ->label('Контент')
                    ->hint('Таблицы, произвольный текст и т.д.'),
                Repeater::make('facilities')
                    ->label('Характеристики и функции')
                    ->schema([
                        TextInput::make('title')
                            ->label('Заголовок')
                            ->required(),
                        RichEditor::make('content')
                            ->label('Содержимое')
                            ->required()
                    ])
                    ->orderable()
                    ->createItemButtonLabel('Добавить блок')
                    ->columnSpan(2),
                TextInput::make('video')
                    ->maxLength(255)
                    ->label('Ссылка на видео')
                    ->hint('Видео формата https://www.youtube.com/watch?v=FwlczfL2hZk'),
                Select::make('product_category_id')
                    ->label('Категория продукции')
                    ->relationship('category', 'name')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('product')
                    ->image()
                    ->collection('products')
                    ->label('Основное изображение'),
                SpatieMediaLibraryFileUpload::make('slider')
                    ->image()
                    ->multiple()
                    ->enableReordering()
                    ->panelLayout('grid')
                    ->collection('sliders')
                    ->label('Изображения в слайдере'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('product')
                    ->collection('products')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
