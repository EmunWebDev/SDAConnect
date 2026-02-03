<?php

namespace App\Filament\Resources\Officers\Tables;

use App\Models\Department;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group as GroupingGroup;

class OfficersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('member.image')
                    ->label('Image')
                    ->default(
                        fn($record) =>
                        "https://api.dicebear.com/9.x/avataaars/svg?seed=" . md5($record->id) . "&backgroundColor=c0aede"
                    )
                    ->circular(),
                TextColumn::make('member.full_name')
                    ->label('Name')
                    ->searchable()
                    ->weight(FontWeight::SemiBold),
                TextColumn::make('position.name')
                    ->searchable(),
                TextColumn::make('department.name')
                    ->searchable(),
                TextColumn::make('start_of_term')
                    ->date()
                    ->searchable(),
                TextColumn::make('end_of_term')
                    ->date()
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Active' => 'info',
                        'On vacation' => 'warning',
                        'Sick leave' => 'danger',
                        'Term done' => 'success',
                    }),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Created since')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->since()
                    ->label('Updated since')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('department')
                    ->label('Department')
                    ->relationship('department', 'name'),
                TrashedFilter::make()
            ])
            ->recordActions([
                EditAction::make()
                    ->label('')
                    ->modalWidth('xl')
                    ->tooltip('Edit'),
                DeleteAction::make()
                    ->label('')
                    ->tooltip('Archive'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->groups([
                GroupingGroup::make('department.name')
                    ->label('Department')
                    ->collapsible(),
                GroupingGroup::make('position.name')
                    ->label('Position')
                    ->collapsible(),
                GroupingGroup::make('status')
                    ->label('Status')
                    ->collapsible(),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped();
    }
}
