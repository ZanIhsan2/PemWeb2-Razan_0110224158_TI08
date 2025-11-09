<?php

namespace App\Filament\Resources\ProvinciesResource\Pages;

use App\Filament\Resources\ProvinciesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvincies extends EditRecord
{
    protected static string $resource = ProvinciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
