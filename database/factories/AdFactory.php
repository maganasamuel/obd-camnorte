<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'effective_from' => now(),
            'effective_to' => function (array $attributes) {
                return $attributes['effective_from']->clone()->addDays(random_int(5, 30));
            },
            'active' => true,
        ];
    }

    public function dormant(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'effective_from' => now()->addDays(random_int(1, 5)),
                'effective_to' => function (array $attributes) {
                    return $attributes['effective_from']->clone()->addDays(random_int(5, 30));
                },
            ];
        });
    }

    public function expired(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'effective_to' => now()->subDays(random_int(1, 5)),
                'effective_from' => function (array $attributes) {
                    return $attributes['effective_to']->clone()->subDays(random_int(5, 30));
                },
            ];
        });
    }

    public function inactive(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => false,
            ];
        });
    }
}
