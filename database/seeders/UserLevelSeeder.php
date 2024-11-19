<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Illuminate\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userLevels = [
            ['name' => 'Responsable'],
            ['name' => 'Colaborador'],
            ['name' => 'Supervisor'],
            ['name' => 'Monitor']
        ];

        foreach ($userLevels as $user) {
            UserLevel::create($user);
        }
    }
}
