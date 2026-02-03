<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->placeholder('Enter title')
                            ->required(),
                        Textarea::make('content')
                            ->required()
                            ->placeholder('Enter content here')
                            ->rows(3),
                        Toggle::make('is_published'),
                        Hidden::make('user_id')
                            ->default(fn() => Auth::id()),
                    ])
            ])->columns(1);
    }
}
