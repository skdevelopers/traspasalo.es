<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert multiple customers manually
        Customer::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Example Street, Example City',
        ]);

        Customer::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'phone' => '0987654321',
            'address' => '456 Another Street, Another City',
        ]);

        // Add more customers as needed
    }
}
