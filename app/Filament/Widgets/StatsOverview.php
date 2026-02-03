<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\Member;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Members', Member::count()),
            Stat::make('Active Members', Member::query()->where('membership_status', 'Active')->count()),
            Stat::make('Ongoing Events', Event::query()->where('status', 'Ongoing')->count()),
            // Stat::make('Projects', Project::count())
            //     ->description('Total No. of Projects')
            //     ->descriptionIcon('heroicon-o-building-library', IconPosition::Before)
            //     ->descriptionColor('success')
            //     ->chart([40, 15, 35, 50])
            //     ->color('success'),
        ];
    }
}
