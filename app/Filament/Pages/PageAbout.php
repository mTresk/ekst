<?php

namespace App\Filament\Pages;

use App\Models\About;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Resources\Form;

class PageAbout extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Общее';
    protected static ?string $title = 'Общее';
    protected static ?string $navigationGroup = 'О компании';
    protected static ?string $slug = 'about-page';
    protected static ?int $navigationSort = 7;

    protected static string $view = 'filament.pages.page-about';

    use Forms\Concerns\InteractsWithForms;

    public string $article;
    public string $about;

    public function mount(): void
    {
        $aboutPage = About::first();

        if ($aboutPage) {
            $this->form->fill([
                'article' => $aboutPage->article,
                'about' => $aboutPage->about,
            ]);
        } else {
            About::create([
                'article' => '',
            ]);
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    RichEditor::make('content')
                        ->label('Содержимое')
                        ->required()
                        ->maxLength(65535)
                        ->columnSpan(2),
                ])
            ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                Textarea::make('about')
                    ->label('О компании')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ]),
            Card::make([
                RichEditor::make('article')
                    ->label('Статья')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ])
        ];
    }

    protected function getFormModel(): About
    {
        return About::first();
    }

    public function create(): void
    {
        $aboutPage = About::first();
        $aboutPage->update($this->form->getState());
        $this->notify('success', 'Сохранено');
    }
}