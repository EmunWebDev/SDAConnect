<?php

namespace App\Filament\Resources\Expenses\Pages;

use Filament\Actions\CreateAction;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use App\Filament\Resources\Expenses\ExpenseResource;

class ListExpenses extends ListRecords
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Export expenses')
                ->exports([
                    ExcelExport::make()
                        ->withFilename(fn($resource) => $resource::getLabel())
                        ->withColumns([
                            Column::make('amount'),
                            Column::make('expenseType.name')
                                ->heading('Expense type'),
                            Column::make('purpose'),
                            Column::make('user.name')
                                ->heading('Recorded by'),
                            Column::make('created_at')
                                ->heading('Date created')
                        ]),
                ]),
            CreateAction::make()
                ->modalWidth('2xl'),
        ];
    }
}
