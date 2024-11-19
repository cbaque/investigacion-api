<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create(
            [
                'name' => "Investigación",
                'link' => "investigation",
                'icon' => "profile",
                'tab' => true,
                'selected' => true
            ],
        ); 

        Menu::create(
            [
                'name' => "Científico",
                'link' => "scientist",
                'icon' => "profile",
                'tab' => true,
                'selected' => true
            ],
        );   
        
        Menu::create(
            [
                'name' => "Usuarios",
                'link' => "users",
                'icon' => "user",
                'tab' => false,
                'selected' => false
            ],
        );


    }
}
