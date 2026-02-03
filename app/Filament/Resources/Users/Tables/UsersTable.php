<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->weight(FontWeight::SemiBold),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable()
                    ->icon('heroicon-o-envelope'),
                TextColumn::make('role')
                    ->badge(),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Created since'),
                TextColumn::make('updated_at')
                    ->since()
                    ->label('Updated since')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->since()
                    ->label('Archived since')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make()
            ])
            ->recordActions([
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
            ->recordUrl(null)
            ->defaultSort('created_at', 'desc')
            ->striped()
            // ->modifyQueryUsing(function ($query) {
            //     $query->where('role', '!=', 'Super Admin');
            // })
        ;
    }
}
