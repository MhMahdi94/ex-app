<?php

namespace Database\Seeders;

use App\Models\Accounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Accounts::create(['account_no'=>1, 
            'account_parent_id'=>0, 
            'account_name'=>'Assets', 
            'account_type'=>1, 
            'account_report'=>1, 
            'account_level'=>1,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0, 
            'company_id'=>1, 
        ]);
        Accounts::create(['account_no'=>2, 
            'account_parent_id'=>0, 
            'account_name'=>'Liabilities', 
            'account_type'=>1, 
            'account_report'=>1, 
            'account_level'=>1,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0, 
            'company_id'=>1, 
        ]);
        Accounts::create(['account_no'=>3, 
            'account_parent_id'=>0, 
            'account_name'=>'Equity', 
            'account_type'=>1, 
            'account_report'=>1, 
            'account_level'=>1,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0, 
            'company_id'=>1, 
        ]);
        Accounts::create(['account_no'=>4, 
            'account_parent_id'=>0, 
            'account_name'=>'Revenue', 
            'account_type'=>1, 
            'account_report'=>2, 
            'account_level'=>1,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0, 
            'company_id'=>1, 
        ]);
        Accounts::create(['account_no'=>5, 
            'account_parent_id'=>0, 
            'account_name'=>'Expenses', 
            'account_type'=>1, 
            'account_report'=>2, 
            'account_level'=>1,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0, 
            'company_id'=>1, 
        ]);
    }
}
