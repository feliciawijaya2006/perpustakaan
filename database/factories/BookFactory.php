<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BookFactory extends Factory
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
            'judulbuku' => fake()->sentence(),
            'namapenerbit' => fake()->company(),
            'jenisbuku' => fake()->randomElement(['ebook', 'buku fisik']),
            'tahunterbit' => fake() -> year(),
            'harga' => fake() -> numberBetween(50000, 200000),
            'stok' => fake() -> numberBetween(1, 100),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'judulbuku' => null,
        ]);
    }
}
