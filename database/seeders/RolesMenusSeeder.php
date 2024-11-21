<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleHasMenu;

class RolesMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // administrador todas las opciones
        $role = Role::where('name', 'admin')->first();
        $menu = Menu::all();

        foreach ($menu as $key => $value) {
            RoleHasMenu::create(
                [
                    'role_id' => $role->id,
                    'menu_id' => $value->id
                ],
            );            
        }

        // reseacher solo investigacion
        $role = Role::where('name', 'researcher')->first();
        $menu = Menu::where('name', 'Investigación')->get();

        foreach ($menu as $key => $value) {
            RoleHasMenu::create(
                [
                    'role_id' => $role->id,
                    'menu_id' => $value->id
                ],
            );            
        }

        // scientist solo cientifico
        $role = Role::where('name', 'scientist')->first();
        $menu = Menu::where('name', 'Científico')->get();
        
        foreach ($menu as $key => $value) {
            RoleHasMenu::create(
                [
                    'role_id' => $role->id,
                    'menu_id' => $value->id
                ],
            );            
        }

    }
}
