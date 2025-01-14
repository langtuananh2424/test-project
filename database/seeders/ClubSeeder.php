<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Clubs;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index)
        {
            Clubs::create([
                'name' => $faker->company,
                'stadium' => $faker->city,
                'city' => $faker->city,
            ]);
        }
    }
}
