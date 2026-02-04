<?php

namespace App\Filament\Clerk\Resources\Members\Schemas;

use Filament\Schemas\Schema;

use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ToggleButtons;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->description('Basic personal information details of the member')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Member image')
                                    ->image()
                                    ->alignCenter()
                                    ->avatar()
                                    ->directory('members')
                                    ->imageEditor(),

                                Group::make()
                                    ->schema([
                                        TextInput::make('first_name')
                                            ->required()
                                            ->placeholder('Enter first name')
                                            ->columnSpan(6),
                                        TextInput::make('middle_name')
                                            ->required()
                                            ->placeholder('Enter middle name')
                                            ->columnSpan(6),
                                        TextInput::make('last_name')
                                            ->required()
                                            ->placeholder('Enter last name')
                                            ->columnSpan(6),
                                        Select::make('suffix')
                                            ->columnSpan(3)
                                            ->placeholder('Select suffix')
                                            ->options([
                                                'II' => 'II',
                                                'III' => 'III',
                                                'Jr.' => 'Jr.',
                                                'Sr.' => 'Sr.',
                                            ]),
                                        Select::make('gender')
                                            ->required()
                                            ->placeholder('Select gender')
                                            ->options([
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                            ])
                                            ->columnSpan(3),
                                    ])
                                    ->columns(12)
                                    ->columnSpan(5),

                                DatePicker::make('date_of_birth')
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Select date of birth')
                                    ->columnSpan(2),
                                Select::make('marital_status')
                                    ->required()
                                    ->placeholder('Select civil status')
                                    ->options([
                                        'Single' => 'Single',
                                        'Married' => 'Married',
                                        'Separated' => 'Separated',
                                        'Widowed' => 'Widowed',
                                    ])
                                    ->columnSpan(2),
                                TextInput::make('occupation')
                                    ->placeholder('Enter occupation')
                                    ->required()
                                    ->columnSpan(2),

                            ])->columns(6)
                    ]),

                Section::make('Contact Information')
                    ->description('Contact information details of the member')
                    ->schema([
                        TextInput::make('complete_address')
                            ->required()
                            ->placeholder('Enter complete address')
                            ->columnSpanFull(),
                        TextInput::make('email_address')
                            ->placeholder('Enter email address')
                            ->columnSpan(2),
                        TextInput::make('phone_no')
                            ->label('Phone no.')
                            ->placeholder('Enter phone no.')
                            ->columnSpan(2),
                        TextInput::make('facebook_account')
                            ->placeholder('Enter facebook account')
                            ->columnSpan(2),
                        TextInput::make('emergency_contact_name')
                            ->columnSpan(2)
                            ->required()
                            ->placeholder('Enter name of emergency contact'),
                        TextInput::make('emergency_contact_phone_no')
                            ->columnSpan(2)
                            ->required()
                            ->placeholder('Enter phone no. of emergency contact'),
                        TextInput::make('emergency_contact_relation')
                            ->placeholder('Enter relationship of emergency contact')
                            ->required()
                            ->columnSpan(2),

                    ])->columns(6),

                Section::make('Membership and Baptism Information')
                    ->description('Church association membership and baptism information details')
                    ->schema([
                        TextInput::make('baptism_location')
                            ->required()
                            ->placeholder('Enter baptism location of member')
                            ->columnSpanFull(),
                        DatePicker::make('baptism_date')
                            ->columnSpan(3)
                            ->native(false)
                            ->placeholder('Select date')
                            ->required(),
                        DatePicker::make('membership_date')
                            ->required()
                            ->placeholder('Select date')
                            ->native(false)
                            ->columnSpan(3),
                        ToggleButtons::make('membership_status')
                            ->columnSpan(6)
                            ->options([
                                'Active' => 'Active',
                                'Inactive' => 'Inactive',
                                'Transferred' => 'Transferred',
                            ])
                            ->colors([
                                'Active' => 'info',
                                'Inactive' => 'danger',
                                'Transferred' => 'warning',
                            ])
                            ->default('Active')
                            ->inline(),

                    ])->columns(12),

                Hidden::make('user_id')
                    ->default(fn() => Auth::id()),
            ])->columns(1);
    }
}
