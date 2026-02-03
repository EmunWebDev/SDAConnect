<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\ToggleButtons;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->placeholder('Enter name of event')
                            ->columnSpanFull(),
                        Select::make('event_type_id')
                            ->required()
                            ->relationship('eventType', 'name')
                            ->placeholder('Select event type')
                            ->columnSpanFull(),
                        Textarea::make('content')
                            ->required()
                            ->placeholder('Enter content of event')
                            ->columnSpanFull()
                            ->rows(3),
                        DatePicker::make('start_date')
                            ->required()
                            ->native(false)
                            ->placeholder('Select date'),
                        DatePicker::make('end_date')
                            ->required()
                            ->native(false)
                            ->placeholder('Select date'),
                        TextInput::make('location')
                            ->required()
                            ->placeholder('Enter location')
                            ->columnSpanFull(),
                        ToggleButtons::make('status')
                            ->inline()
                            ->options([
                                'Pending' => 'Pending',
                                'Ongoing' => 'Ongoing',
                                'Completed' => 'Completed'
                            ])
                            ->colors([
                                'Pending' => 'warning',
                                'Ongoing' => 'info',
                                'Completed' => 'success',
                            ])
                            ->default('Pending')
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('is_published'),
                        Hidden::make('user_id')
                            ->default(fn() => Auth::id())

                    ])->columns(2)
            ])->columns(1);
    }
}
