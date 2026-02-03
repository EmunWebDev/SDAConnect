<?php

namespace App\Filament\Clerk\Resources\Members\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('middle_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('full_name'),
                TextInput::make('suffix'),
                DatePicker::make('date_of_birth')
                    ->required(),
                Select::make('gender')
                    ->options(['Male' => 'Male', 'Female' => 'Female'])
                    ->required(),
                TextInput::make('marital_status')
                    ->required(),
                TextInput::make('complete_address')
                    ->required(),
                TextInput::make('email_address')
                    ->email(),
                TextInput::make('phone_no')
                    ->tel(),
                TextInput::make('facebook_account'),
                TextInput::make('occupation')
                    ->required(),
                Select::make('membership_status')
                    ->options(['Active' => 'Active', 'Inactive' => 'Inactive', 'Transferred' => 'Transferred'])
                    ->required(),
                DatePicker::make('membership_date')
                    ->required(),
                DatePicker::make('baptism_date')
                    ->required(),
                Textarea::make('baptism_location')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('emergency_contact_name')
                    ->required(),
                TextInput::make('emergency_contact_phone_no')
                    ->tel()
                    ->required(),
                TextInput::make('emergency_contact_relation')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
