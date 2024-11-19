<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\RoleHasUserLevel;
use App\Models\UserLevel;

class RolesUserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'admin')->first();
        $userLevel = UserLevel::all();

        foreach ($userLevel as $key => $value) {
            RoleHasUserLevel::create(
                [
                    'role_id' => $role->id,
                    'user_level_id' => $value->id
                ],
            );            
        }


        $role = Role::whereIn('name', ['manager', 'incharge'])->get();
        $userLevel = UserLevel::where('name', 'Responsable')->first();

        foreach ($role as $key => $value) {
            RoleHasUserLevel::create(
                [
                    'role_id' => $value->id,
                    'user_level_id' => $userLevel->id
                ],
            );            
        }

        
        $role = Role::whereIn('name', ['manager', 'incharge', 'supplier'])->get();
        $userLevel = UserLevel::where('name', 'Colaborador')->first();

        foreach ($role as $key => $value) {
            RoleHasUserLevel::create(
                [
                    'role_id' => $value->id,
                    'user_level_id' => $userLevel->id
                ],
            );            
        }


        $role = Role::whereNotIn('name', ['admin'])->get();
        $userLevel = UserLevel::where('name', 'Supervisor')->first();

        foreach ($role as $key => $value) {
            RoleHasUserLevel::create(
                [
                    'role_id' => $value->id,
                    'user_level_id' => $userLevel->id
                ],
            );            
        }

        $role = Role::whereIn('name', ['monitor1', 'monitor2'])->get();
        $userLevel = UserLevel::where('name', 'Monitor')->first();

        foreach ($role as $key => $value) {
            RoleHasUserLevel::create(
                [
                    'role_id' => $value->id,
                    'user_level_id' => $userLevel->id
                ],
            );            
        }


    }
}
