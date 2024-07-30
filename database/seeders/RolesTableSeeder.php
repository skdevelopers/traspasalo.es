<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
         $role = Role::firstOrCreate(['name' => 'admin']);
         $permissions = Permission::all();
         $role->syncPermissions($permissions);

        // $adminRole = Role::where('name', 'admin')->first();

        // // Get all permissions
        // $permissions = Permission::all();

        // // Sync all permissions to the 'admin' role
        // $adminRole->syncPermissions($permissions);

        // Assign specific permissions to other roles as needed
    }
}
