<?php

namespace App\Filament\Resources\EventTypes\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;
use App\Filament\Resources\EventTypes\RelationManagers\EventsRelationManager;

class EventTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->weight(FontWeight::SemiBold),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Created since'),
                TextColumn::make('updated_at')
                    ->since()
                    ->label('Updated since')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                RelationManagerAction::make('lesson-relation-manager')
                    ->label('')
                    ->modalWidth('4xl')
                    ->slideOver()
                    ->tooltip('View events')
                    ->icon('heroicon-o-calendar-date-range')
                    ->relationManager(EventsRelationManager::make()),
                EditAction::make()
                    ->modalWidth('xl')
                    ->label('')
                    ->tooltip('Edit'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped();
    }
}
