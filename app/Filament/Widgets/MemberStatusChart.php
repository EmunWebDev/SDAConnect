<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use Filament\Widgets\ChartWidget;

class MemberStatusChart extends ChartWidget
{
    protected ?string $heading = 'Member Status Chart';

    protected static ?int $sort = 1;

    protected ?string $maxHeight = '255px';

    protected function getData(): array
    {
        // Count members per status
        $active = Member::where('membership_status', 'Active')->count();
        $inactive = Member::where('membership_status', 'Inactive')->count();
        $transferred = Member::where('membership_status', 'Transferred')->count();

        return [
            'labels' => ['Active', 'Inactive', 'Transferred'],
            'datasets' => [
                [
                    'label' => 'Member Status Distribution',
                    'data' => [$active, $inactive, $transferred],
                    'backgroundColor' => [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)'
                    ],
                ],
            ],
        ];
    }

    public function getDescription(): ?string
    {
        return 'Membership status proportion';
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
