<?php

namespace App\Filament\Clerk\Resources\Members\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Enums\FontWeight;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;

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
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::SemiBold),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender'),
                TextColumn::make('marital_status')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_address')
                    ->placeholder('No email address')
                    ->searchable()
                    ->icon('heroicon-o-envelope'),
                TextColumn::make('phone_no')
                    ->placeholder('No phone no.')
                    ->searchable()
                    ->icon('heroicon-o-device-phone-mobile')
                    ->label('Phone no.'),
                TextColumn::make('facebook_account')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('occupation')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->sortable(),
                TextColumn::make('emergency_contact_name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('emergency_contact_phone_no')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('emergency_contact_relation')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label('Created by')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->label('Archived since')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                //     ForceDeleteBulkAction::make(),
                //     RestoreBulkAction::make(),
                // ]),
            ])
            ->recordUrl(null);
    }
}
