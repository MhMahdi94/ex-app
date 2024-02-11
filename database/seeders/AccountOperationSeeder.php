<?php

namespace Database\Seeders;

use App\Models\AccountOperation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AccountOperation::create(
            ['name'=>['en'=>'Journal','ar'=>'قيد']]
        );
        AccountOperation::create(
            ['name'=>['en'=>'Income Document','ar'=>'سند قبض']]
        );
        AccountOperation::create(
            ['name'=>['en'=>'Output Document','ar'=>'سند صرف']]
        );
    }
}
