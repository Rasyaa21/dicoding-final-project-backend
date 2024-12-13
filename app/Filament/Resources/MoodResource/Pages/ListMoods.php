<?php

namespace App\Filament\Resources\MoodResource\Pages;

use App\Filament\Resources\MoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMoods extends ListRecords
{
    protected static string $resource = MoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
