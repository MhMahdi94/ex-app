<?php

namespace Database\Seeders;

use App\Models\COALEVELTWO;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class COALEVELTWOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Assets
        COALEVELTWO::create([
            'code'=>'1001',
            'name'=>'Current Assets',
            'parent_id'=>1,
        ]);
        COALEVELTWO::create([
            'code'=>'1002',
            'name'=>'Fixed Assets',
            'parent_id'=>1,
        ]);

        //Liabilities
        COALEVELTWO::create([
            'code'=>'2001',
            'name'=>'Current Liabilities',
            'parent_id'=>2,
        ]);
        COALEVELTWO::create([
            'code'=>'2002',
            'name'=>'Non Current Liabilities',
            'parent_id'=>2,
        ]);
        
        //Expenses
        COALEVELTWO::create([
            'code'=>'4001',
            'name'=>'Advertising',
            'parent_id'=>4,
        ]);
        COALEVELTWO::create([
            'code'=>'4002',
            'name'=>'Car & Truck Expenses',
            'parent_id'=>4,
        ]);
        COALEVELTWO::create([
            'code'=>'4003',
            'name'=>'Office Expenses',
            'parent_id'=>4,
        ]);

        //Revenues
        COALEVELTWO::create([
            'code'=>'5001',
            'name'=>'Sales',
            'parent_id'=>5,
        ]);
        COALEVELTWO::create([
            'code'=>'5002',
            'name'=>'Other',
            'parent_id'=>5,
        ]);
    }
}
