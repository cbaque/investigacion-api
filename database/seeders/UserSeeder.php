<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Business;
use App\Models\People;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $business = Business::where('ruc', '0999999999001')->first();
        $personAdmin = People::create([
            'name' => "Claudio Baque",
            'dni' => "09999999999",
            'phone' => '099999999',
            'address' => '',
            'email' => '',
        ]);


        $userAdmin = User::create([
            'name' => "Claudio Baque",
            'email' => "cbaque@gmail.com",
            'password' => Hash::make('admin'),
            'business_id' => $business->id,
            'people_id' => $personAdmin->id
        ]);  
        $roleAdmin = Role::where('name', 'admin')->first();
        $userAdmin->assignRole($roleAdmin);
        //  FIN USUARIO ADMINISTRADOR
        
        
        // $personManager = People::create([
        //     'name' => "Gestor Name",
        //     'dni' => "0999999999999",
        //     'phone' => '099999999',
        //     'address' => '',
        //     'email' => '',
        // ]);


        // $userManager = User::create([
        //     'name' => "Gestor",
        //     'email' => "gestor@controlg.com",
        //     'password' => Hash::make('gestor'),
        //     'business_id' => $business->id,
        //     'people_id' => $personManager->id
        // ]);  

        // $roleManager= Role::where('name', 'manager')->first();
        // $userManager->assignRole($roleManager);
        // // FIN USUARIO GESTOR
        
        // $personAnalyst = People::create([
        //     'name' => "Analista Name",
        //     'dni' => "0999999999999",
        //     'phone' => '099999999',
        //     'address' => '',
        //     'email' => '',
        // ]);


        // $userAnalyst = User::create([
        //     'name' => "Analista",
        //     'email' => "analista@controlg.com",
        //     'password' => Hash::make('analista'),
        //     'business_id' => $business->id,
        //     'people_id' => $personAnalyst->id
        // ]);

        // $roleAnalyst= Role::where('name', 'analyst')->first();
        // $userAnalyst->assignRole($roleAnalyst);


    }
}
