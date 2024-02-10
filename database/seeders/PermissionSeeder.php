<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [

            ['name' =>    'create-admin', 'guard_name' => 'admin',],
            ['name' =>    'edit-admin', 'guard_name' => 'admin',],
            ['name' =>    'delete-admin', 'guard_name' => 'admin',],
            ['name' =>    'create-package', 'guard_name' => 'admin',],
            ['name' =>    'edit-package', 'guard_name' => 'admin',],
            ['name' =>    'delete-package', 'guard_name' => 'admin',],
            ['name' =>    'create-role', 'guard_name' => 'admin',],
            ['name' =>    'edit-role', 'guard_name' => 'admin'],
            ['name' =>    'delete-role', 'guard_name' => 'admin'],
            ['name' =>    'create-company', 'guard_name' => 'admin'],
            ['name' =>    'edit-company', 'guard_name' => 'admin'],
            ['name' =>    'delete-company', 'guard_name' => 'admin'],
            ['name' =>    'create-company-owner', 'guard_name' => 'admin'],
            ['name' =>    'edit-company-owner', 'guard_name' => 'admin'],
            ['name' =>    'delete-company-owner', 'guard_name' => 'admin'],
            ['name' =>    'create-business', 'guard_name' => 'admin'],
            ['name' =>    'edit-business', 'guard_name' => 'admin'],
            ['name' =>    'delete-business', 'guard_name' => 'admin'],
            ['name' =>    'create-business-owner', 'guard_name' => 'admin'],
            ['name' =>    'edit-business-owner', 'guard_name' => 'admin'],
            ['name' =>    'delete-business-owner', 'guard_name' => 'admin'],
            
            //company panel
            ['name' =>    'create-role', 'guard_name' => 'employee',],
            ['name' =>    'edit-role', 'guard_name' => 'employee'],
            ['name' =>    'delete-role', 'guard_name' => 'employee'],
            ['name' =>    'create-employee', 'guard_name' => 'employee',],
            ['name' =>    'details-employee', 'guard_name' => 'employee'],
            ['name' =>    'edit-employee', 'guard_name' => 'employee'],
            ['name' =>    'delete-employee', 'guard_name' => 'employee'],
            ['name' =>    'search-attendence', 'guard_name' => 'employee',],
            ['name' =>    'print-attendence', 'guard_name' => 'employee'],
            ['name' =>    'create-department', 'guard_name' => 'employee',],
            ['name' =>    'edit-department', 'guard_name' => 'employee'],
            ['name' =>    'delete-department', 'guard_name' => 'employee'],
            ['name' =>    'add-product', 'guard_name' => 'employee',],
            ['name' =>    'stock-report', 'guard_name' => 'employee',],
            ['name' =>    'leave-settings', 'guard_name' => 'employee'],
            ['name' =>    'accept-leave', 'guard_name' => 'employee'],
            ['name' =>    'reject-leave', 'guard_name' => 'employee'],
            ['name' =>    'add-account', 'guard_name' => 'employee',],
            ['name' =>    'export-accounts', 'guard_name' => 'employee',],
            ['name' =>    'add-journal', 'guard_name' => 'employee',],
            ['name' =>    'show-journal', 'guard_name' => 'employee',],
            ['name' =>    'add-document', 'guard_name' => 'employee',],
            ['name' =>    'show-document', 'guard_name' => 'employee',],
            ['name' =>    'search-payroll', 'guard_name' => 'employee',],
            ['name' =>    'print-payroll', 'guard_name' => 'employee'],
            
            //business
            ['name' =>    'create-user', 'guard_name' => 'business',],
            ['name' =>    'edit-user', 'guard_name' => 'business',],
            ['name' =>    'delete-user', 'guard_name' => 'business',],
            ['name' =>    'create-category', 'guard_name' => 'business',],
            ['name' =>    'edit-category', 'guard_name' => 'business',],
            ['name' =>    'delete-category', 'guard_name' => 'business',],
            ['name' =>    'create-product', 'guard_name' => 'business',],
            ['name' =>    'edit-product', 'guard_name' => 'business',],
            ['name' =>    'delete-product', 'guard_name' => 'business',],
            ['name' =>    'create-service', 'guard_name' => 'business',],
            ['name' =>    'edit-service', 'guard_name' => 'business',],
            ['name' =>    'delete-service', 'guard_name' => 'business',],
            ['name' =>    'create-client', 'guard_name' => 'business',],
            ['name' =>    'edit-client', 'guard_name' => 'business',],
            ['name' =>    'delete-client', 'guard_name' => 'business',],
            ['name' =>    'create-order', 'guard_name' => 'business',],
            ['name' =>    'edit-order', 'guard_name' => 'business',],
            ['name' =>    'delete-order', 'guard_name' => 'business',],
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission['name'], 'guard_name' =>  $permission['guard_name']]);
        }
    }
}
