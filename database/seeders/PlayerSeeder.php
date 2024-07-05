<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    public function run()
    {

        Player::factory()->count(16)->create([
            'gender' => 'male',
        ]);

        Player::factory()->count(16)->create([
            'gender' => 'female',
        ]);
    }
}