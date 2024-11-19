<?php

namespace Database\Seeders;

use App\Models\Screen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $screens = [
            ['name' => 'Resumen'],
            ['name' => 'Ejecución'],
            ['name' => 'Reportes'],
            ['name' => 'Documentos'],
            ['name' => 'Mensajes'],
            ['name' => 'Auditoria'],
            ['name' => 'Flujo'],
            ['name' => 'Ficha'],
            ['name' => 'Registro'],
            ['name' => 'Calidad'],
            ['name' => 'Pagos'],
            ['name' => 'Indicadores'],
            ['name' => 'Riesgos'],
            ['name' => 'Encuesta'],
        ];

        foreach ($screens as $screen) {
            Screen::create($screen);
        }
    }
}
