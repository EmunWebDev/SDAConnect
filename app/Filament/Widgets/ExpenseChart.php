<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class ExpenseChart extends ChartWidget
{
    protected ?string $heading = 'Expenses Chart';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = Trend::model(Expense::class)
            ->between(
                start: now()->startOfMonth(),        // can also be startOfYear()
                end: now()->endOfMonth(),        // can also be endOfYear()
            )
            ->perDay()        // can also be perWeek()
            ->sum('amount');        // can also be sum('processing_fee') 				

        return [
            'datasets' => [
                [
                    'label' => 'Expenses',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'tension' => 0.3,
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    public function getDescription(): ?string
    {
        return 'Expenses trend this month';
    }

    protected function getType(): string
    {
        return 'line';
    }
}
