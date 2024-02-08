<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
    }
}
