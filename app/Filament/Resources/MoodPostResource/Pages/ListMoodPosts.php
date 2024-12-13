<?php

namespace App\Filament\Resources\MoodPostResource\Pages;

use App\Filament\Resources\MoodPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMoodPosts extends ListRecords
{
    protected static string $resource = MoodPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
