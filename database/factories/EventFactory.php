<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $registrationStartsAt = fake()->dateTimeBetween('-1 week', '+1 week');
        $registratoinEndsAt = $registrationStartsAt->modify('+1 month');
        $eventStartsAt = fake()->dateTimeBetween('+4 months', '+12 months');
        $eventEndsAt = $eventStartsAt->modify('+3 days');

        return [
            'name' => fake()->text(10),
            'description' => fake()->paragraph(4),
            'location' => fake()->address(),
            'status' => fake()->randomElement(['draft', 'active', 'cancelled', 'completed']),
            'price' => fake()->randomFloat(2, 100, 800),
            'tickets_available' => fake()->numberBetween(40, 200),
            'registration_starts_at' => $registrationStartsAt,
            'registration_ends_at' => $registratoinEndsAt,
            'starts_at' => $eventStartsAt,
            'ends_at' => $eventEndsAt,
        ];
    }
}
