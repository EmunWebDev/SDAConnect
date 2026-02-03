<?php

namespace App\Filament\Resources\Departments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DepartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->weight(FontWeight::SemiBold),
                TextColumn::make('member.full_name')
                    ->label('Chairperson'),
                TextColumn::make('created_at')
                    ->label('Created since')
                    ->since(),
                TextColumn::make('updated_at')
                    ->since()
                    ->label('Updated since')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->modalWidth('2xl')
                    ->tooltip('View'),
                EditAction::make()
                    ->label('')
                    ->tooltip('Edit')
                    ->modalWidth('2xl'),
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
