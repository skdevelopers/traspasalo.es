<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            DefaultUserSeeder::class,
            GroupsTableSeeder::class,
            ChartOfAccountsTableSeeder::class,
            AccountsTableSeeder::class,
            // Add other seeders if needed
        ]);
//        User::factory(1)->create([
//            'name' => 'Bricklays',
//            'email' => 'salman@bricklays.com',
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),
//        ]);

    }
}
