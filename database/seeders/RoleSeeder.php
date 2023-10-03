<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'superAdmin']);
        $role2 = Role::create(['name' => 'cajero']);
        $role3 = Role::create(['name' => 'garzon']);
        $role4 = Role::create(['name' => 'guardia']);
        $role5 = Role::create(['name' => 'chica']);

        Permission::create(['name' => 'permissions.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1]);


        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'piezas.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'piezas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'piezas.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'piezas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'piezas.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'productos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'chicas.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'chicas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'chicas.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'chicas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'chicas.destroy'])->syncRoles([$role1]);

    }

}

