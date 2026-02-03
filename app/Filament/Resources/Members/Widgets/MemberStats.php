<?php

namespace App\Filament\Resources\Members\Widgets;

use App\Models\Member;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MemberStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Registered Members', Member::count())
                ->descriptionColor('primary'),
            Stat::make('Active Members', Member::query()->where('membership_status', 'Active')->count())
                ->descriptionColor('primary'),
            Stat::make('Inactive Members', Member::query()->where('membership_status', 'Inactive')->count())
                ->descriptionColor('primary'),
            Stat::make('Transferred Members', Member::query()->where('membership_status', 'Transferred')->count())
                ->descriptionColor('primary'),

        ];
    }
}
