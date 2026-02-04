<?php

namespace App\Filament\Widgets;

use Event;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Events\EventResource;

class LatestEvents extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {

        return $table
            ->query(EventResource::getEloquentQuery())
            ->description('List of latest events created')
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('eventType.name'),
                TextColumn::make('start_date')
                    ->date(),
                TextColumn::make('end_date')
                    ->date(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Ongoing' => 'info',
                        'Completed' => 'success',
                    }),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Created since'),
            ])
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
