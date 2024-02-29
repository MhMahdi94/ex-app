<?php

namespace Database\Seeders;

use App\Models\AccountParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AccountParent::create([
            'account_no' => 1,

            'account_name' => ['en'=>'Assets','ar'=>'الاصول'],

            'account_report' => 1,


        ]);
        AccountParent::create([
            'account_no' => 2,

            'account_name' => ['en'=>'Liabilities','ar'=>'الالتزامات'],
            'account_report' => 1,


        ]);
        AccountParent::create([
            'account_no' => 3,

            'account_name' => ['en'=>'Equity','ar'=>'حقوق الملكية'],

            'account_report' => 1,


        ]);
        AccountParent::create([
            'account_no' => 4,

            'account_name' => ['en'=>'Revenue','ar'=>'الايرادات'],

            'account_report' => 2,



        ]);
        AccountParent::create([
            'account_no' => 5,
            'account_name' => ['en'=>'Expenses','ar'=>'المصروفات'],

            'account_report' => 2,


        ]);
    }
}
