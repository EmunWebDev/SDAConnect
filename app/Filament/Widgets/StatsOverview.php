<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\Expense;
use App\Models\Member;
use App\Models\Offering;
use Illuminate\Support\Number;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Active Members', Member::query()->where('membership_status', 'Active')->count())
                ->description('Total no. of active members')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->descriptionColor('primary'),
            Stat::make('Ongoing Events', Event::query()->where('status', 'Ongoing')->count())
                ->description('Current ongoing events')
                ->descriptionIcon('heroicon-o-calendar-days', IconPosition::Before)
                ->descriptionColor('primary'),
            Stat::make(
                'Monthly Expenses',
                Number::currency(
                    Expense::query()
                        ->whereYear('created_at', now()->year)
                        ->whereMonth('created_at', now()->month)
                        ->sum('amount'),
                    'PHP'
                )
            )
                ->description('Total expenses this month')
                ->descriptionIcon('heroicon-o-banknotes', IconPosition::Before)
                ->descriptionColor('primary'),
            Stat::make(
                'Monthly Offerings',
                Number::currency(
                    Offering::query()
                        ->whereYear('created_at', now()->year)
                        ->whereMonth('created_at', now()->month)
                        ->sum('accumulated_amount'),
                    'PHP'
                )
            )
                ->description('Total offerings this month')
                ->descriptionIcon('heroicon-o-banknotes', IconPosition::Before)
                ->descriptionColor('primary'),

        ];
    }
}
