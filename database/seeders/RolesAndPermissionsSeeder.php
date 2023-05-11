<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo vai trò Độc giả
        $readerRole = Role::create(['name' => 'reader']);
        $readerPermission = 'read articles';
        $permission = Permission::create(['name' => $readerPermission]);
        $readerRole->givePermissionTo($permission);

        // Tạo vai trò Biên tập viên
        $editorRole = Role::create(['name' => 'editor']);
        $editorPermission = 'write articles';
        $permission = Permission::create(['name' => $editorPermission]);
        $editorRole->givePermissionTo($permission);

        // Tạo vai trò Admin
        $adminRole = Role::create(['name' => 'admin']);
        $adminPermission = 'manage users';
        $permission = Permission::create(['name' => $adminPermission]);
        $adminRole->givePermissionTo($permission);
    }
}
