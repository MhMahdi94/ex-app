<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Creating Super Admin User
        $superAdmin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'super-admin@example.com',
            'is_super'=>1,
            'status'=>1,
            'mobile_no'=>'971542287649',
            'password'=>Hash::make('password'),
        ]);
        $superAdmin->assignRole('Super Admin');

        // // Creating Admin User
        // $admin = User::create([
        //     'name' => 'Syed Ahsan Kamal', 
        //     'email' => 'ahsan@allphptricks.com',
        //     'password' => Hash::make('ahsan1234')
        // ]);
        // $admin->assignRole('Admin');
    }
}
