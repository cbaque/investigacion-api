<?php

namespace Database\Seeders;

use App\Models\Mode;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ModesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modes = [
            ['code' => 'G', 'name' => 'General'],
            ['code' => 'F', 'name' => 'Flujo'],
            ['code' => 'P', 'name' => 'Ficha', 'deleted_at' => Carbon::now()],
            ['code' => 'C', 'name' => 'Contratos', 'deleted_at' => Carbon::now()],
            ['code' => 'GPR', 'name' => 'Integral', 'deleted_at' => Carbon::now()],
            ['code' => 'E', 'name' => 'Encuestas', 'deleted_at' => Carbon::now()],
        ];

        foreach ($modes as $mode) {
            Mode::create($mode);
        }
    }
}
