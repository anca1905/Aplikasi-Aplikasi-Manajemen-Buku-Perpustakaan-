<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'judul'     => $this->faker->sentence(3),
                'ISBN'      => $this->faker->isbn13,
                'penulis'   => $this->faker->name,
                'tahun'     => $this->faker->numberBetween(1990, 2024),
                'kategori'  => $this->faker->randomElement(['Teknik', 'Filsafat', 'Novel', 'Sejarah', 'Sains']),
            ];
    }
}
