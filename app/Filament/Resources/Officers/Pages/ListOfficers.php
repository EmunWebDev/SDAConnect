<?php

namespace App\Filament\Resources\Officers\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use App\Filament\Resources\Officers\OfficerResource;

class ListOfficers extends ListRecords
{
    protected static string $resource = OfficerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('xl'),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All')
                ->badge(fn() => $this->getTableQuery()->count()),
            'Active' => Tab::make()
                ->label('Active')
                ->badge(fn() => $this->getTableQuery()->where('status', 'Active')->count())
                ->query(fn($query) => $query->where('status', 'Active')),
            'On vacation' => Tab::make()
                ->label('On vacation')
                ->badge(fn() => $this->getTableQuery()->where('status', 'On vacation')->count())
                ->query(fn($query) => $query->where('status', 'On vacation')),
            'Sick leave' => Tab::make()
                ->label('Sick leave')
                ->badge(fn() => $this->getTableQuery()->where('status', 'Sick leave')->count())
                ->query(fn($query) => $query->where('status', 'Sick leave')),
            'Term done' => Tab::make()
                ->label('Term done')
                ->badge(fn() => $this->getTableQuery()->where('status', 'Term done')->count())
                ->query(fn($query) => $query->where('status', 'Term done')),
        ];
    }
}
