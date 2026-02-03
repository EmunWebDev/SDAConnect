<?php

namespace App\Filament\Resources\Offerings\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class OfferingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('accumulated_amount')
                            ->required()
                            ->placeholder('0.00')
                            ->prefix('PHP')
                            ->numeric(),
                        Hidden::make('user_id')
                            ->default(fn() => Auth::id()),
                    ])
            ])->columns(1);
    }
}
