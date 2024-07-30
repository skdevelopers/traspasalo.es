<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeatureService;

class FeatureServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert multiple feature services manually
        FeatureService::create([
            'name' => 'WiFi',
        ]);

        FeatureService::create([
            'name' => 'Parking',
        ]);

        FeatureService::create([
            'name' => 'Breakfast',
        ]);

        FeatureService::create([
            'name' => 'Swimming Pool',
        ]);

        // Add more feature services as needed
    }
}
