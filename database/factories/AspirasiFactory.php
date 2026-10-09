<?php

namespace Database\Factories;

use App\Models\Aspirasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aspirasi>
 */
class AspirasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->optional()->safeEmail(),
            'no_hp' => fake()->optional()->numerify('08##########'),
            'kategori' => fake()->randomElement(Aspirasi::KATEGORI),
            'isi' => fake()->paragraph(),
            'status' => 'baru',
            'tanggapan' => null,
            'tanggapan_at' => null,
        ];
    }

    /**
     * Aspirasi yang sudah ditanggapi pengurus.
     */
    public function ditanggapi(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'selesai',
            'tanggapan' => 'Terima kasih, aspirasi sedang kami tindaklanjuti.',
            'tanggapan_at' => now(),
        ]);
    }
}
