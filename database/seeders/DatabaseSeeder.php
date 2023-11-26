<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Role::factory()->create([
            "name"=> "Super Admin",
        ]);
        \App\Models\Role::factory()->create([
            "name"=> "Admin",
        ]);
        \App\Models\Role::factory()->create([
            "name"=> "Employee",
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super-admin@example.com',
            'password'=>Hash::make('password'),
            
        ]);
       Admin::factory()->create([
        'name' => 'Super Admin',
        'email' => 'super-admin@example.com',
        'is_super'=>1,
        'status'=>1,
        'mobile_no'=>'971542287649',
        'password'=>Hash::make('password'),
       ]);

      
       Request::create([
        'name'=>'Company Name',
        'owner'=>'Owner Company',
        'address'=>'Company Address',
        'email'=>'company@example.com',
        'mobileNo'=>'0123123123',
        'noOfEmployee'=>'10',
        'noOfDepts'=>'3',
        'status'=>false,
       ]);
       Request::create([
        'name'=>'Company Name2',
        'owner'=>'Owner Company2',
        'address'=>'Company Address2',
        'email'=>'company2@example.com',
        'mobileNo'=>'0123123124',
        'noOfEmployee'=>'50',
        'noOfDepts'=>'6',
        'status'=>true,
       ]);
    }
}
