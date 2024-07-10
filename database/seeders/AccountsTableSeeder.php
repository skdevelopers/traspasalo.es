<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['account_number' => '1001001', 'name' => 'Land', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001002', 'name' => 'Building', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001003', 'name' => 'Plant & Machinery', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001004', 'name' => 'Furniture & Fixtures', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001005', 'name' => 'Office Equipment', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001006', 'name' => 'Vehicles', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001007', 'name' => 'Allowance for Depreciation - Building', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001008', 'name' => 'Allowance for Depreciation - Plant & Machinery', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001009', 'name' => 'Allowance for Depreciation - Furniture & Fixtures', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001010', 'name' => 'Allowance for Depreciation - Office Equipment', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001011', 'name' => 'Allowance for Depreciation - Vehicles', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1001012', 'name' => 'Society equipment', 'group' => 'Fixed Assets', 'chart_of_account_id' => 1, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1002001', 'name' => 'Stock 1', 'group' => 'Stock-in-Trade', 'chart_of_account_id' => 2, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1003001', 'name' => 'Trade Receivables', 'group' => 'Accounts Receivables', 'chart_of_account_id' => 3, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1006001', 'name' => 'Cash at Bank', 'group' => 'Cash & Bank', 'chart_of_account_id' => 6, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '1006002', 'name' => 'Cash in Hand', 'group' => 'Cash & Bank', 'chart_of_account_id' => 6, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '3001001', 'name' => 'Share Capital', 'group' => 'Equity', 'chart_of_account_id' => 7, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '3002001', 'name' => 'Accumulated Profit', 'group' => 'Reserves', 'chart_of_account_id' => 8, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '3001002', 'name' => 'Owner Investment', 'group' => 'Equity', 'chart_of_account_id' => 7, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '4001001', 'name' => 'Sale - Local', 'group' => 'Sale & Service', 'chart_of_account_id' => 13, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5001001', 'name' => 'Stock 1 Consumed', 'group' => 'Operating Expenses', 'chart_of_account_id' => 15, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5001002', 'name' => 'Salaries & Wages', 'group' => 'Operating Expenses', 'chart_of_account_id' => 15, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5001003', 'name' => 'Repair & Maintenance', 'group' => 'Operating Expenses', 'chart_of_account_id' => 15, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5001004', 'name' => 'Rent, Rates & Taxes', 'group' => 'Operating Expenses', 'chart_of_account_id' => 15, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5001005', 'name' => 'Utilities', 'group' => 'Operating Expenses', 'chart_of_account_id' => 15, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5001006', 'name' => 'Depreciation Expense', 'group' => 'Operating Expenses', 'chart_of_account_id' => 15, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002001', 'name' => 'Salaries & Wages', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002002', 'name' => 'Repair & Maintenance', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002003', 'name' => 'Travelling & Conveyance', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002004', 'name' => 'Rent, Rates & Taxes', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002005', 'name' => 'Utilities', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002006', 'name' => 'Printing & Stationery', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002007', 'name' => 'Advertisement', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002008', 'name' => 'Legal & Professional', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5002009', 'name' => 'Depreciation Expense', 'group' => 'Administrative Expenses', 'chart_of_account_id' => 16, 'parent_id' => null, 'enabled' => 1],
            ['account_number' => '5003001', 'name' => 'Income Tax', 'group' => 'Taxes', 'chart_of_account_id' => 17, 'parent_id' => null, 'enabled' => 1],


        // Add more accounts as needed
        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
