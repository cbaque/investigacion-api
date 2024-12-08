<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view', 'description' => 'Ver Listado Principal']);
        Permission::create(['name' => 'create', 'description' => 'Crear Nuevo Registro']);
        Permission::create(['name' => 'edit', 'description' => 'Editar Registro']);
        Permission::create(['name' => 'delete', 'description' => 'Borrar Registro']);
        Permission::create(['name' => 'print', 'description' => 'Imprimir Registro']);

        $role = Role::create(['name' => 'admin', 'description' => 'Administrador']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'researcher', 'description' => 'Investigacion']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'scientist', 'description' => 'Cientifico']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'linkage', 'description' => 'Vinculacion']);
        $role->givePermissionTo(Permission::all());
    }
}
