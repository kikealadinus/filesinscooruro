<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Secretaria1']);
        $role4 = Role::create(['name' => 'Secretaria2']);

        //RUTA DE ROLES
        Permission::create(['name' => 'admin.roles.index', 
                            'description' => 'Puede ver listado de roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Puede crear un nuevo rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Puede editar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Puede eliminar un rol'])->syncRoles([$role1]);

        //RUTA DE PERMISOS
        Permission::create(['name' => 'admin.permisos.index',
                            'description' => 'Ver listado de permisos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.permisos.create',
                            'description' => 'Crear un nuevo permiso'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.permisos.edit',
                            'description' => 'Editar un permiso'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.permisos.destroy',
                            'description' => 'Eliminar un permiso'])->syncRoles([$role1]);

        //RUTA DE ASIGNAR
        Permission::create(['name' => 'admin.asignar.index',
                            'description' => 'Puede ver y asignar roles a un usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.asignar.create',
                            'description' => 'Puede crear y asignar rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.asignar.edit',
                            'description' => 'Puede editar un rol de usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.asignar.destroy',
                            'description' => 'Puede eliminar un rol de usuario'])->syncRoles([$role1]);
        
        //RUTA DE HOME
        Permission::create(['name' => 'admin.home',  
                            'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2, $role3, $role4]);

        //RUTA DE USUARIOS
        Permission::create(['name' => 'admin.user.index', 
                            'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.user.create',
                            'description' => 'Crear un nuevo usuario'])->syncRoles([$role1, $role2,]);

        Permission::create(['name' => 'admin.user.edit', 
                            'description' => 'Editar un usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.user.destroy',
                            'description' => 'Eliminar un usuario'])->syncRoles([$role1]);
    }
}