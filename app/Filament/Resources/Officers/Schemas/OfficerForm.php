<?php

namespace App\Filament\Resources\Officers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OfficerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'full_name')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->placeholder('Select member')
                            ->columnSpanFull(),
                        Select::make('position_id')
                            ->label('Position')
                            ->placeholder('Select position')
                            ->relationship('position', 'name')
                            ->required()
                            ->columnSpanFull(),
                        Select::make('department_id')
                            ->placeholder('Select department')
                            ->relationship('department', 'name')
                            ->label('Department')
                            ->required()
                            ->columnSpanFull(),
                        DatePicker::make('start_of_term')
                            ->placeholder('Select date')
                            ->required()
                            ->native(false),
                        DatePicker::make('end_of_term')
                            ->placeholder('Select date')
                            ->native(false)
                            ->required(),
                        ToggleButtons::make('status')
                            ->required()
                            ->inline()
                            ->default('Active')
                            ->options([
                                'Active' => 'Active',
                                'On vacation' => 'On vacation',
                                'Sick leave' => 'Sick leave',
                                'Term done' => 'Term done',
                            ])
                            ->colors([
                                'Active' => 'info',
                                'On vacation' => 'warning',
                                'Sick leave' => 'danger',
                                'Term done' => 'success',
                            ])

                            ->columnSpanFull()
                    ])->columns(2)
            ])->columns(1);
    }
}
