<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'Allow_Categories',
            'Allow_Features',
            'Allow_Clients',
            'Allow_Packages',
            
            // Add more permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
