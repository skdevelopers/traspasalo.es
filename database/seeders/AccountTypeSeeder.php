<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccountType;

class AccountTypeSeeder extends Seeder
{
    public function run()
    {
        AccountType::create([
            'name' => 'Free Account',
            'monthly_price' => 0,
            'yearly_price' => 0,
            'descriptions' => [
                'Upload 1 business',
                'Contact details 2 eur',
                'Search alerts',
                'Highlight ad 5 eur',
            ],
        ]);

        AccountType::create([
            'name' => 'Silver Account',
            'monthly_price' => 10,
            'yearly_price' => 110,
            'descriptions' => [
                'Upload 2 to 7 businesses/month',
                'Contact details 1.5 eur',
                'Search list available',
                'Compare listings',
                'Search alerts',
                '1 free highlight/year then 3 euros per highlight',
            ],
        ]);

        AccountType::create([
            'name' => 'Pro Account',
            'monthly_price' => 50,
            'yearly_price' => 550,
            'descriptions' => [
                'Upload 8 to 50 businesses/month',
                'Contact details 1.5 eur',
                'Search list available',
                'Compare listings',
                'QR codes',
                '1 free highlight/month then 2 euros per highlight',
            ],
        ]);
    }
}
