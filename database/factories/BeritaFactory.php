<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'judul' => fake()->sentence(8),
    'slug' => fake()->unique()->slug(),
    'isi' => fake()->paragraphs(5, true),
    'gambar' => null,
    'user_id' => 1,
    'status' => true,
];

    }
}
