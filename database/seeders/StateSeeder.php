<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Nuevos' , 'icon' => 'plus-square', 'color' => '#0000ff'],
            ['name' => 'En Ejecución', 'icon' => 'play-circle', 'color' => '#00cc00'],
            ['name' => 'Atrasados', 'icon' => 'clock-circle', 'color' => '#ffff00'],
            ['name' => 'Detenidos', 'icon' => 'pause-circle', 'color' => '#ff0000'],
            ['name' => 'En Espera', 'icon' => 'stop', 'color' => '#00ffff'],
            ['name' => 'Revisión', 'icon' => 'check-circle', 'color' => '#00cc00']
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
