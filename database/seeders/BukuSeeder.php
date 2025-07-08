<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 50; $i++) { 
            DB::table('bukus')->insert([
                'judul'     => $faker->sentence(3),
                'ISBN'      => $faker->isbn13,
                'penulis'   => $faker->name,
                'tahun'     => $faker->numberBetween(1990, 2024),
                'kategori'  => $faker->randomElement(['Teknik', 'Filsafat', 'Novel', 'Sejarah', 'Sains']),
            ]);
        }
    }
}
