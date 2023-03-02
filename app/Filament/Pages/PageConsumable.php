<?php

namespace App\Filament\Pages;

use App\Models\Consumable;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PageConsumable extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
    protected static ?string $modelLabel = 'Расходные материалы';
    protected static ?string $navigationLabel = 'Расходные материалы';
    protected static ?string $title = 'Расходные материалы';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationGroup = 'Сервис';

    protected static string $view = 'filament.pages.page-consumable';

    use Forms\Concerns\InteractsWithForms;

    public string $content;

    public function mount(): void
    {
        $consumablePage = Consumable::first();

        if ($consumablePage) {
            $this->form->fill([
                'name' => $consumablePage->name,
                'content' => $consumablePage->content,
            ]);
        } else {
            Consumable::create([
                'content' => '',
                'name' => '',
            ]);
        }
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->label('Заголовок')
                ->maxLength(255),
            Card::make([
                TinyEditor::make('content')
                    ->label('Содержимое')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ])
        ];
    }

    protected function getFormModel(): Consumable
    {
        return Consumable::first();
    }

    public function create(): void
    {
        $consumablePage = Consumable::first();
        $consumablePage->update($this->form->getState());
        $this->form->model($consumablePage)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
