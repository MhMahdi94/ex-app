<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /**( `subscriptionEnd`,) */
        Company::create(
            [
                'name'=>['en'=>'Company 1', 'ar'=>'شركة 1'],
                'email'=>'x@comapny.com',
                'description'=>'desc',
                'noOfDept'=>15,
                'noOfEmployee'=>3,
                'subscriptionStart'=>'2024-02-10 00:00:00',
                'subscriptionEnd'=>'2024-02-29 00:00:00'
            ]
        );
    }
}
