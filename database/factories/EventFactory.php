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
        $registrationStartsAtClone = clone $registrationStartsAt;
        $registratoinEndsAt = $registrationStartsAtClone->modify('+1 month');
        $eventStartsAt = fake()->dateTimeBetween('+4 months', '+12 months');
        $eventStartsAtClone = clone $eventStartsAt;
        $eventEndsAt = $eventStartsAtClone->modify('+3 days');

        return [
            'name' => fake()->sentence(6, true),
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
