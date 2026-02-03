<?php

namespace App\Filament\Resources\ExpenseTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExpenseTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->placeholder('Enter expense type')
                            ->required(),
                    ])
            ])->columns(1);
    }
}
