<?php

namespace App\Filament\Resources\Members\Pages;

use Filament\Actions\CreateAction;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use App\Filament\Resources\Members\MemberResource;
use App\Filament\Resources\Members\Widgets\MemberStats;

class ListMembers extends ListRecords
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Export members')
                ->exports([
                    ExcelExport::make()
                        ->withFilename(fn($resource) => $resource::getLabel())
                        ->withColumns([
                            Column::make('first_name'),
                            Column::make('middle_name'),
                            Column::make('last_name'),
                            Column::make('date_of_birth'),
                            Column::make('gender'),
                            Column::make('complete_address'),
                            Column::make('email_address'),
                            Column::make('membership_status'),
                        ]),
                ]),
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            MemberStats::class
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All')
                ->badge(fn() => $this->getTableQuery()->count()),
            'Active' => Tab::make()
                ->label('Active')
                ->badge(fn() => $this->getTableQuery()->where('membership_status', 'Active')->count())
                ->query(fn($query) => $query->where('membership_status', 'Active')),
            'Inactive' => Tab::make()
                ->label('Inactive')
                ->badge(fn() => $this->getTableQuery()->where('membership_status', 'Inactive')->count())
                ->query(fn($query) => $query->where('membership_status', 'Inactive')),
            'Transferred' => Tab::make()
                ->label('Transferred')
                ->badge(fn() => $this->getTableQuery()->where('membership_status', 'Transferred')->count())
                ->query(fn($query) => $query->where('membership_status', 'Transferred')),
        ];
    }
}
