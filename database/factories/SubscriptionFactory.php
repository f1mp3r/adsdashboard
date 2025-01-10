<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startPeriod = fake()->dateTimeBetween('-1 year', 'now');
        $endPeriod = rand(0, 10) <= 2
            ? fake()->dateTimeBetween($startPeriod, '+30 days')
            : null
        ;

        return [
            'user_id' => User::factory()->create()->id,
            'start_period' => $startPeriod,
            'end_period' => $endPeriod,
        ];
    }
}
