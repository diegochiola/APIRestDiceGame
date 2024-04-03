<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Si llamo al factory es menos codigo
        Game::factory(10)->create();
        /*Game::create([
            'dice1' => 2, 'dice2' => 6,
            'won' => false,
            'user_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Game::create([
            'dice1' => 2, 'dice2' => 5,
            'won' => true,
            'user_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Game::create([
            'dice1' => 3, 'dice2' => 4,
            'won' => true,
            'user_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Game::create([
            'dice1' => 4, 'dice2' => 6,
            'won' => false,
            'user_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */
    }
}
