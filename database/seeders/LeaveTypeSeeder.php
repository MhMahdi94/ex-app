<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        LeaveType::create(['name'=>'Daily Leave']);
        LeaveType::create(['name'=>'Sick Leave']);
        LeaveType::create(['name'=>'Annaual Leave']);
        LeaveType::create(['name'=>'Emergency Leave']);
    }
}
