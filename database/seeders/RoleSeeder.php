<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define roles
        $roles = [
            ['name' => 'Owner'],
            ['name' => 'Admin'],
            ['name' => 'Manager'],
            ['name' => 'Employee'],
            // Add more roles as needed
        ];

        // Insert roles into database
        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}
