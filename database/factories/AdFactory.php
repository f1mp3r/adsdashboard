<?php

namespace Database\Factories;

use App\Enums\AdStatus;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ad>
 */
class AdFactory extends Factory
{
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'url' => fake()->url(),
            'status' => fake()->randomElement(collect(AdStatus::cases())->pluck('value')->toArray()),
        ];
    }
}
