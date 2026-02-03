<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('amount')
                            ->required()
                            ->prefix('PHP')
                            ->placeholder('0.00')
                            ->minValue(0)
                            ->numeric(),
                        Select::make('expense_type_id')
                            ->required()
                            ->placeholder('Select expense type')
                            ->relationship('expenseType', 'name'),
                        Textarea::make('purpose')
                            ->required()
                            ->placeholder('Enter purpose of expense')
                            ->rows(3)
                            ->columnSpanFull(),
                        Hidden::make('user_id')
                            ->default(fn() => Auth::id()),


                    ])->columns(2)
            ])->columns(1);
    }
}
