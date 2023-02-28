<?php

namespace App\Filament\Pages;

use App\Models\History;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;

class PageHistory extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'История';
    protected static ?string $title = 'История';
    protected static ?string $navigationGroup = 'О компании';
    protected static ?string $slug = 'history-page';
    protected static ?int $navigationSort = 7;

    protected static string $view = 'filament.pages.page-history';

    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $historyPage = History::first();

        if ($historyPage) {
            $this->form->fill([
                'period' => $historyPage->period,
            ]);
        } else {
            History::create([
                'period' => '',
            ]);
        }
    }

    protected function getFormSchema(): array
    {
        return [
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
        ];
    }

    protected function getFormModel(): History
    {
        return History::first();
    }

    public function create(): void
    {
        $historyPage = History::first();
        $historyPage->update($this->form->getState());
        $this->form->model($historyPage)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
