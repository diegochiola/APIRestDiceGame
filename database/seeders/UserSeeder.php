<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //primero corroborar que funcione
        //creamos el administrador
        User::create([         
            'name' => 'admin',
            'nickname' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');

        //poblar tablas con users
        User::factory()
            ->count(15)
            ->hasGames(5)
            ->create()
            ->each(function($user){
                $user->assignRole('player');
            });
        }
    }