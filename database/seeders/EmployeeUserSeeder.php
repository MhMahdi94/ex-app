<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /** `name`, `email`, `mobile_no`, `added_by`, `updated_by`, `password`, `status`, `is_owner`, `company_id`, */
        $employee=Employees::create([
            'name'=>['en'=>'Mohammed Mahdy', 'ar'=>'محمد مهدي'],
            'email'=>'mohdmahdy94@gmail.com',
            'mobile_no'=>'971542287649',
            'password'=>Hash::make('password'),
            'company_id'=>1,
            
        ]);

        $employee->assignRole('Company Owner');
    }
}
