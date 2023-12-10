<?php

namespace Database\Seeders;

use App\Models\COALEVELONE;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class COALEVELONESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        COALEVELONE::create([
            'code'=>'100',
            'name'=>'Assets',
            
        ]);
        COALEVELONE::create([
            'code'=>'200',
            'name'=>'Liabilities'
        ]);
        COALEVELONE::create([
            'code'=>'300',
            'name'=>'Equity'
        ]);
        COALEVELONE::create([
            'code'=>'400',
            'name'=>'Expenses'
        ]);
        COALEVELONE::create([
            'code'=>'500',
            'name'=>'Revenues'
        ]);
    }
}
