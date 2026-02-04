<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->unique()
                            ->placeholder('Enter department name'),
                        Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->placeholder('Enter department description')
                            ->columnSpanFull(),
                        Select::make('member_id')
                            ->required()
                            ->label('Chairperson')
                            ->placeholder('Select chairperson')
                            ->preload()
                            ->searchable()
                            ->relationship('member', 'full_name'),
                    ])
            ])->columns(1);
    }
}
