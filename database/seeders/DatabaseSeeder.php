<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat beberapa izin
        $permissions = [
            'add user',
            'edit user',
            'delete user',
            'view bagi hasil'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Buat beberapa peran dan tetapkan izin
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleEditor = Role::create(['name' => 'member']);
        $roleEditor->givePermissionTo(['view bagi hasil']);
    }
}
