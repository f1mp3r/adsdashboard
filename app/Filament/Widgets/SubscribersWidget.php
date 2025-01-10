<?php

namespace App\Filament\Widgets;

use App\Models\Subscription;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class SubscribersWidget extends ChartWidget
{
    protected static ?string $heading = 'New subscriptions last 12 months';

    protected int | string | array $columnSpan = 2;

    public function getMaxHeight(): ?string
    {
        return '300px';
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'New subscribers',
                    'data' => collect(range(1, 12))->map(fn ($i) => Subscription::whereMonth('start_period', Carbon::now()->subMonths($i))->count()),
                ],
            ],
            'labels' => collect(range(1, 12))->map(fn ($i) => Carbon::now()->subMonths($i)->format('M')),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
