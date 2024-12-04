<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $admin_permission = Permission::create(['name' => 'admin_access', 'guard_name' => 'admin']);

        $admin->givePermissionTo($admin_permission);

    }
}
