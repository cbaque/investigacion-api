<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Business;

class BusinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::create([
            'name' => "Investigacion",
            'ruc' => "0999999999001",
            'email' => "administrador@gmail.com",
            'path_logo' => ""
        ]);
    }
}
