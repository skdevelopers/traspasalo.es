<?php

namespace Database\Seeders;

use App\Models\ChartOfAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartOfAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chartOfAccounts = [
            ['group_id' => 1, 'parent_id' => null, 'name' => 'Fixed Assets'],
            ['group_id' => 1, 'parent_id' => null, 'name' => 'Stock-in-Trade'],
            ['group_id' => 1, 'parent_id' => null, 'name' => 'Accounts Receivables'],
            ['group_id' => 1, 'parent_id' => null, 'name' => 'Loans & Advances'],
            ['group_id' => 1, 'parent_id' => null, 'name' => 'Deposits, Prepayments & Other Receivables'],
            ['group_id' => 1, 'parent_id' => null, 'name' => 'Cash & Bank'],
            ['group_id' => 3, 'parent_id' => null, 'name' => 'Equity'],
            ['group_id' => 3, 'parent_id' => null, 'name' => 'Reserves'],
            ['group_id' => 2, 'parent_id' => null, 'name' => 'Long Term Liabilities'],
            ['group_id' => 2, 'parent_id' => null, 'name' => 'Short Term Loans'],
            ['group_id' => 2, 'parent_id' => null, 'name' => 'Advances, Deposits & Other Liabilities'],
            ['group_id' => 2, 'parent_id' => null, 'name' => 'Accounts Payable'],
            ['group_id' => 4, 'parent_id' => null, 'name' => 'Sale & Service'],
            ['group_id' => 4, 'parent_id' => null, 'name' => 'Other Income'],
            ['group_id' => 5, 'parent_id' => null, 'name' => 'Operating Expenses'],
            ['group_id' => 5, 'parent_id' => null, 'name' => 'Administrative Expenses'],
            ['group_id' => 5, 'parent_id' => null, 'name' => 'Taxes'],
        ];

        foreach ($chartOfAccounts as $coa) {
            ChartOfAccount::create($coa);
        }
    }
}
