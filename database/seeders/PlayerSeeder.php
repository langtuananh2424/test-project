<?php

namespace Database\Seeders;

use App\Models\Clubs;
use App\Models\Players;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = Clubs::all();
        $faker = Faker::create();
        foreach ($clubs as $club) {
            for ($i = 0; $i < 5; $i++) {
                Players::create([
                    'club_id' => $club->id,
                    'name' => $faker->name,
                    'position' => $faker->randomElement(['Thủ môn', 'Hậu vệ', 'Tiền đạo']),
                    'number' => $faker->randomNumber(3),
                    'birthday' => $faker->date(),
                ]);
            }
        }
    }
}
