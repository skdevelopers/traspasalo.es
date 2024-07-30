<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert parent categories
        $parentCategory1 = Category::create([
            'name' => 'Real EState',
          //  'parent_id' => null,
        ]);

        $parentCategory2 = Category::create([
            'name' => 'Business Consulting',
            //'parent_id' => null,
        ]);

        // Insert child categories
        Category::create([
            'name' => 'Car Washer',
            //'parent_id' => $parentCategory1->id,
        ]);

        Category::create([
            'name' => 'Beauty Salon',
           // 'parent_id' => $parentCategory1->id,
        ]);

        Category::create([
            'name' => 'Fitness Center',
            //'parent_id' => $parentCategory2->id,
        ]);

        

        // Add more categories as needed
    }
}
