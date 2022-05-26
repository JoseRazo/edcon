<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Hash;

class RoleSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'crear estudiantes']);
        Permission::create(['name' => 'editar estudiantes']);
        Permission::create(['name' => 'leer estudiantes']);
        Permission::create(['name' => 'eliminar estudiantes']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'superadmin']);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('crear estudiantes');
        $role2->givePermissionTo('editar estudiantes');
        $role2->givePermissionTo('leer estudiantes');
        $role2->givePermissionTo('eliminar estudiantes');

        // create demo users
        $user = \App\Models\Usuario::create([
            'nombre' => 'José Rosario',
            'apellido_paterno' => 'Razo',
            'apellido_materno' => 'Prieto',
            'email' => 'jose@app.com',
            'password' => Hash::make('password'),
            'activo' => true,
        ]);
        $user->assignRole($role1);

        $user = \App\Models\Usuario::create([
            'nombre' => 'Karla',
            'apellido_paterno' => 'Zavala',
            'apellido_materno' => 'Pelayo',
            'email' => 'karla@app.com',
            'password' => Hash::make('password'),
            'activo' => true,
        ]);
        $user->assignRole($role2);
    }
}