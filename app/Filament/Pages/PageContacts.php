<?php

namespace App\Filament\Pages;

use App\Models\About;
use App\Models\Contact;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Resources\Form;

class PageContacts extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Контакты';
    protected static ?string $title = 'Контакты';
    protected static ?string $navigationGroup = 'Контакты';
    protected static ?string $slug = 'contacts-page';
    protected static ?int $navigationSort = 14;

    protected static string $view = 'filament.pages.page-contacts';

    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $contactPage = Contact::first();

        if ($contactPage) {
            $this->form->fill([
                'address' => $contactPage->address,
                'email' => $contactPage->email,
                'phone' => $contactPage->phone,
                'schedule' => $contactPage->schedule,
                'vk' => $contactPage->vk,
                'telegram' => $contactPage->telegram,
                'whatsapp' => $contactPage->whatsapp,
                'unit' => $contactPage->unit,
            ]);
        } else {
            Contact::create([
                'article' => '',
            ]);
        }
    }

    protected function getFormSchema(): array
    {
        return [
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
                        TextInput::make('address')
                            ->label('Адрес'),
                    ])
                    ->orderable()
                    ->createItemButtonLabel('Добавить отдел'),
            ]),
        ];
    }

    protected function getFormModel(): Contact
    {
        return Contact::first();
    }

    public function create(): void
    {
        $contactPage = Contact::first();
        $contactPage->update($this->form->getState());
        $this->form->model($contactPage)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
