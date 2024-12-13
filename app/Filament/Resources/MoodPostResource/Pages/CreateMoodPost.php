<?php

namespace App\Filament\Resources\MoodPostResource\Pages;

use App\Filament\Resources\MoodPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMoodPost extends CreateRecord
{
    protected static string $resource = MoodPostResource::class;
}
