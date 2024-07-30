<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // Insert multiple users manually
            User::create([
                'first_name' => 'Salman',
                'last_name' => 'Khalid',
                'email' => 'salman@thinkdeliver.com',
                'mobile_number' => '1234567890',
                'password' => bcrypt('password123'), // hashed password
                'provider' => null,
                'provider_id' => null,
                'avatar' => 'https://thinkdeliver.com/avatar/johndoe.jpg',
                'account_type_id' => 1,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
    
            User::create([
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'janesmith@example.com',
                'mobile_number' => '0987654321',
                'password' => bcrypt('password456'), // hashed password
                'provider' => null,
                'provider_id' => null,
                'avatar' => 'https://thinkdeliver.com/avatar/janesmith.jpg',
                'account_type_id' => 2,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
    
            // Add more users as needed
        }
    }
    

