<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //definicion de roles:
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'api')->first();
        if (!$adminRole) {
            Role::create(['name' => 'admin', 'guard_name' => 'api']);
        }

        $playerRole = Role::where('name', 'player')->where('guard_name', 'api')->first();
        if (!$playerRole) {
            Role::create(['name' => 'player', 'guard_name' => 'api']);
        }
        
        //$admin = Role::create(['name' => 'admin', 'guard_name' => 'api']);
        //$player = Role::create(['name' => 'player', 'guard_name' => 'api']);
        
        
        
        /*
        //admin
        $admin = Role::create(['name' => 'admin']);
        //player
        $player = Role::create(['name' => 'player']);

        //Definicion de permisos por roles por rutas
        Permission::create(['name' => 'index'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'getGames'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'createGame'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'destroy'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'percentageOfWins'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'allUsersPercentageOfWins'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'getTotalPercentageOfWins'])->syncRoles([$admin, $player]);
        */
    }
}