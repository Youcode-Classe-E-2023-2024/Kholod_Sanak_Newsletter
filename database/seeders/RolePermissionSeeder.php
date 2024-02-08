<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve roles
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $editorRole = Role::where('name', 'editor')->first();

        // Retrieve permissions
        $assignRolesPermission = Permission::where('name', 'assign roles')->first();
        $deleteUsersPermission = Permission::where('name', 'delete users')->first();
        $restoreUsersPermission = Permission::where('name', 'restore users')->first();
        // Repeat the same for other permissions...

        // Assign permissions to roles
        $adminRole->givePermissionTo([
            $assignRolesPermission,
            $deleteUsersPermission,
            $restoreUsersPermission,
            // Add other permissions here as needed
        ]);

        // Repeat the same for other roles...
    }
}

