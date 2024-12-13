<?php

namespace App\Filament\Resources\MoodPostResource\Pages;

use App\Filament\Resources\MoodPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMoodPost extends EditRecord
{
    protected static string $resource = MoodPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
