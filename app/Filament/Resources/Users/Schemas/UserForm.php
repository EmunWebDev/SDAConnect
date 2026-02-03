<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->placeholder('Enter full name')
                            ->required(),
                        TextInput::make('email')
                            ->placeholder('Enter email address')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        TextInput::make('password')
                            ->password()
                            ->placeholder('Enter password')
                            ->revealable()
                            ->required()
                            ->same('password_confirmation')
                            ->dehydrateStateUsing(fn($state) => !empty($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->label('Password'),
                        TextInput::make('password_confirmation')
                            ->password()
                            ->placeholder('Confirm password')
                            ->revealable()
                            ->same('password')
                            ->requiredWith('password')
                            ->label('Confirm Password')
                            ->dehydrated(false),
                        Select::make('role')
                            ->placeholder('Select role')
                            ->options([
                                'Super Admin' => 'Super Admin',
                                'Church head' => 'Church head',
                                'Clerk' => 'Clerk',
                                'Treasurer' => 'Treasurer',
                                'Member' => 'Member'
                            ])
                            ->required(),
                    ])
            ])->columns(1);
    }
}
