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
            
            'create-admin',
            'edit-admin',
            'delete-admin',
            'create-package',
            'edit-package',
            'delete-package',
            'create-role',
            'edit-role',
            'delete-role',
            'create-company',
            'edit-company',
            'delete-company',
            'create-company-owner',
            'edit-company-owner',
            'delete-company-owner',
            'create-business',
            'edit-business',
            'delete-business',
            'create-business-owner',
            'edit-business-owner',
            'delete-business-owner',
            // 'create-product',
            // 'edit-product',
            // 'delete-product'
         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'admin']);
          }
    }
}
