<?php

namespace App\Filament\Resources\Members\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group as GroupingGroup;

class MembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->circular()
                    ->default(
                        fn($record) =>
                        "https://api.dicebear.com/9.x/avataaars/svg?seed=" . md5($record->id) . "&backgroundColor=c0aede"
                    ),
                TextColumn::make('full_name')
                    ->label('Name')
                    ->weight(FontWeight::SemiBold)
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('gender')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone_no')
                    ->placeholder('No phone no.')
                    ->searchable()
                    ->icon('heroicon-o-device-phone-mobile')
                    ->label('Phone no.'),
                TextColumn::make('email_address')
                    ->placeholder('No email address')
                    ->searchable()
                    ->icon('heroicon-o-envelope'),
                TextColumn::make('membership_status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Active' => 'info',
                        'Inactive' => 'danger',
                        'Transferred' => 'warning',
                    }),
                TextColumn::make('membership_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('baptism_date')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Created since')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label('Registered by')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->since()
                    ->label('Updated since')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->since()
                    ->label('Archived since')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                    ]),
                TrashedFilter::make()
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->tooltip('View'),
                EditAction::make()
                    ->label('')
                    ->tooltip('Edit'),
                DeleteAction::make()
                    ->label('')
                    ->tooltip('Delete'),
                RestoreAction::make()
                    ->label('')
                    ->tooltip('Restore'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->groups([
                GroupingGroup::make('gender')
                    ->label('Gender')
                    ->collapsible(),
                GroupingGroup::make('membership_status')
                    ->label('Membership status')
                    ->collapsible(),
            ])
            ->recordUrl(null)
            ->defaultSort('created_at', 'desc')
            ->striped();
    }
}
