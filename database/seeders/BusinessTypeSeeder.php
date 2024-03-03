<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BusinessType::create([
            'name'=>['en'=>'Product Business', 'ar'=>'اعمال منتجات']
        ]);

        BusinessType::create([
            'name'=>['en'=>'Service Business', 'ar'=>'اعمال خدمات']
        ]);

        BusinessType::create([
            'name'=>['en'=>'Product/Service Business', 'ar'=>'اعمال منتجات\خدمات']
        ]);
    }
}
