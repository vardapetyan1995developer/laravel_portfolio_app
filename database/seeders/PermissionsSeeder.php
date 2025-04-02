<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view dashboard',
            'manage users',
            'manage roles',
            'manage permissions',
            'manage settings',
            'manage content',
            'manage media',
            'manage menus',
            'manage personal content',
        ];

        foreach ($permissions as $permission)
        {
            Permission::query()->create(['name' => $permission]);
        }
    }
}
