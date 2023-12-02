<?php

namespace Database\Seeders;

use App\Models\LeaveRequset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        LeaveRequset::create([
            'employee_id'=>2,
            'company_id'=>1,
            'leaveType'=>1,
            'startLeave'=>'2023-12-03',
            'endLeave'=>'2023-12-08',
            'status'=>false,
        ]);
        LeaveRequset::create([
            'employee_id'=>2,
            'company_id'=>1,
            'leaveType'=>2,
            'startLeave'=>'2023-12-09',
            'endLeave'=>'2023-12-10',
            'status'=>false,
        ]);
    }
}
