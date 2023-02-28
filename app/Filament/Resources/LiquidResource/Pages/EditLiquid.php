<?php

namespace App\Filament\Resources\LiquidResource\Pages;

use App\Filament\Resources\LiquidResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLiquid extends EditRecord
{
    protected static string $resource = LiquidResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
