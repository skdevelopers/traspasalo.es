<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the roles you want to assign to models (users)
        $modelRoles = [
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 1],
           // ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 2],
            // Add more role assignments as needed
        ];

        // Insert the data into the model_has_roles table
        DB::table('model_has_roles')->insert($modelRoles);
    }
}
