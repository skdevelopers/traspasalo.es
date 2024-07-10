<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Assets'],
            ['name' => 'Liabilities'],
            ['name' => 'Equity'],
            ['name' => 'Income'],
            ['name' => 'Expenses'],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
