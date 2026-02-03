<?php

namespace App\Filament\Resources\Expenses\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Columns\Summarizers\Sum;

class ExpensesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('expenseType.name')
                    ->searchable()
                    ->badge(),
                TextColumn::make('amount')
                    ->summarize([
                        Sum::make()
                            ->label('Overall Sum')
                            ->money('PHP'),
                    ])
                    ->money('PHP')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Recorded by'),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Created since'),
                TextColumn::make('updated_at')
                    ->since()
                    ->label('Updated since')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make()
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->tooltip('View')
                    ->modalWidth('2xl'),
                EditAction::make()
                    ->modalWidth('2xl')
                    ->label('')
                    ->tooltip('Edit'),
                DeleteAction::make()
                    ->label('')
                    ->tooltip('Archive'),
                RestoreAction::make()
                    ->label('')
                    ->tooltip('Restore'),
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
