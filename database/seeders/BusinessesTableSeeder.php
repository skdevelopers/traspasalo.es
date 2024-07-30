<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'category_id' => 1, // Example category ID
            'business_title' => 'Example Business 1',
            'description' => 'Description of Example Business 1',
            'check_in' => '14:00',
            'check_out' => '12:00',
            'age_restriction' => '0-17',
            'pets_permission' => 'NO',
            'location' => '123 Example Street, Example City'
        ]);

        Business::create([
            'category_id' => 2, // Example category ID
            'business_title' => 'Example Business 2',
            'description' => 'Description of Example Business 2',
            'check_in' => '15:00',
            'check_out' => '11:00',
            'age_restriction' => '0-17',
            'pets_permission' => 'YES',
            'location' => '456 Another Street, Another City'
        ]);

        // Add more businesses as needed
    }
}

