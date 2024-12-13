<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MoodPostResource\Pages;
use App\Filament\Resources\MoodPostResource\RelationManagers;
use App\Models\MoodPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MoodPostResource extends Resource
{
    protected static ?string $model = MoodPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Select::make('mood_id')
                    ->relationship('mood', 'mood')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('mood_images')
                    ->relationship('images')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->directory('posts')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(40)
                    ->html(),
                Tables\Columns\TextColumn::make('mood.mood')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMoodPosts::route('/'),
            'create' => Pages\CreateMoodPost::route('/create'),
            'edit' => Pages\EditMoodPost::route('/{record}/edit'),
        ];
    }
}

