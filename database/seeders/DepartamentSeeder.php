<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Gerencia Nacional Técnica'],
            ['name' => 'Gerencia Nacional de Negocios'],
            ['name' => 'Gerencia General'],
            ['name' => 'Gerencia Nacional de Interconexión y Regulación'],
            ['name' => 'Gerencia Nacional de Planificación Empresarial'],
            ['name' => 'Gerencia Nacional Jurídica'],
            ['name' => 'Gerencia Nacional de Tecnologías de la Información'],
            ['name' => 'Gerencia Nacional de Finanzas y Administración'],
            ['name' => 'Gerencia Nacional de Desarrollo Organizacional'],
            ['name' => 'Gerencia Nacional de Cyberseguridad y Control'],
            ['name' => 'Administración Regional 1 - Imbabura'],
            ['name' => 'Administración Regional 2 - Pichincha'],
            ['name' => 'Administración Regional 3 - Tungurahua'],
            ['name' => 'Administración Regional 4 - Manabí'],
            ['name' => 'Administración Regional 5 - Guayas'],
            ['name' => 'Administración Regional 6 - Azuay'],
            ['name' => 'Administración Regional 7 - El Oro'],
        ];

        foreach ($departments as $department) {
            Departament::create($department);
        }
    }
}
