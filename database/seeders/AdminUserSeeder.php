<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Business;
use App\Models\BusniessCompany;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superAdmin=Admin::create([
            'name' => 'Super Admin',
            'email' => 'super-admin@example.com',
            'is_super' => 1,
            'status' => 1,
            'mobile_no' => '971542287649',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin=Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_super' =>0,
            'status' => 1,
            'mobile_no' => '249110102386',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('Admin');

        BusniessCompany::create([
            'name'=>'Business 1',
            'email'=>'business@company.com',
            'mobile_no'=>'971234234234',
            'subscriptionStart'=>Carbon::today(),
            'subscriptionEnd'=>Carbon::today(),
            //'is_owner'=>1,
            'desc'=>'desc' ,
        ]);

        $businessOwner=Business::create([
            'name'=>'Business Owner',
            'email'=>'business@company.com',
            'mobile_no'=>'971234234234',
            'password'=>Hash::make( 'password'),
            'is_owner'=>1,
            'business_id'=>1,
            'added_by'=>1,//Auth::guard('admin')->id(),
        ]);
        $businessOwner->assignRole('Business Owner');
    }
}
