<?php

namespace App\Filament\Widgets;

use App\Models\Subscription;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class UserDataWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 2;

    private static int $daysAgo = 30;

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Churn Rate', $this->getChurnRate())
                ->description('Last 30 days'),
            Stat::make('Active subscriptions', Subscription::active()->count())
                ->description(sprintf('%d churned last 30 days', $this->getChurnedCount())),
        ];
    }

    private function getChurnRate(): int|string
    {
        $churned = $this->getChurnedCount();
        $initialSubscriptionsCount = Subscription::activeOn(now()->subDays(self::$daysAgo))->count();
        $churnRate = $initialSubscriptionsCount ? round(($churned / $initialSubscriptionsCount) * 100, 2) : 0;

        return Number::percentage($churnRate, 2);
    }

    private function getChurnedCount()
    {
        $thirtyDaysAgo = now()->subDays(self::$daysAgo);

        return Subscription::where('start_period', '<', $thirtyDaysAgo)
            ->where('end_period', '>=', $thirtyDaysAgo)
            ->count()
        ;
    }
}
