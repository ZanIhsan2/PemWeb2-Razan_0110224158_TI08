<?php

namespace App\Filament\Resources\ProvinciesResource\Pages;

use App\Filament\Resources\ProvinciesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvincies extends ListRecords
{
    protected static string $resource = ProvinciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
