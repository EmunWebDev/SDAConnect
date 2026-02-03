<?php

namespace App\Filament\Resources\ExpenseTypes;

use App\Filament\Resources\ExpenseTypes\Pages\CreateExpenseType;
use App\Filament\Resources\ExpenseTypes\Pages\EditExpenseType;
use App\Filament\Resources\ExpenseTypes\Pages\ListExpenseTypes;
use App\Filament\Resources\ExpenseTypes\Schemas\ExpenseTypeForm;
use App\Filament\Resources\ExpenseTypes\Tables\ExpenseTypesTable;
use App\Models\ExpenseType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ExpenseTypeResource extends Resource
{
    protected static ?string $model = ExpenseType::class;

    protected static string | BackedEnum | null $activeNavigationIcon = 'heroicon-s-swatch';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static ?int $navigationSort = 6;

    protected static string | UnitEnum | null $navigationGroup = 'Church Operations';

    public static function form(Schema $schema): Schema
    {
        return ExpenseTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExpenseTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExpenseTypes::route('/'),
            // 'create' => CreateExpenseType::route('/create'),
            // 'edit' => EditExpenseType::route('/{record}/edit'),
        ];
    }
}
