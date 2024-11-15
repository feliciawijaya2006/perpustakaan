<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class NewspapersFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggalterbit' => fake()->date('Y-m-d', 'now'),
            'namapenerbit' => fake()->randomElement(['TribunTimur', 'Fajar', 'Kompas']),
            'harga' => fake()-> numberBetween(50000, 200000),
            'stok' => fake()-> numberBetween(1, 100),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'judulcd' => null,
        ]);
    }
}
