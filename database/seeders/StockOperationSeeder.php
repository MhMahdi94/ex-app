<?php

namespace Database\Seeders;

use App\Models\StockOperation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        StockOperation::create([
            'name'=>'Create',
        ]);
        
        StockOperation::create([
            'name'=>'Import',
        ]);
        
        StockOperation::create([
            'name'=>'Export',
        ]);
    }
}
