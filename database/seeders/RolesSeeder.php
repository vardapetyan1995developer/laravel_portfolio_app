<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::query()->create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $editorRole = Role::query()->create(['name' => 'editor']);
        $editorRole->givePermissionTo([
            'view dashboard',
            'manage content',
            'manage media',
        ]);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view dashboard',
            'manage personal content',
        ]);
    }
}
