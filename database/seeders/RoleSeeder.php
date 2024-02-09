<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin panel
        Role::create(['name' => 'Super Admin', 'guard_name'=>'admin']);
       
        $admin = Role::create(['name' => 'Admin','guard_name'=>'admin']);
        

        $admin->givePermissionTo([
            'create-admin',
            'edit-admin',
            'delete-admin',
        ]);

        //company panel
        Role::create(['name' => 'Company Owner', 'guard_name'=>'employee']);
    }
}
