<?php

namespace App\Filament\Resources\DealerResource\Pages;

use App\Filament\Resources\DealerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDealer extends EditRecord
{
    protected static string $resource = DealerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
