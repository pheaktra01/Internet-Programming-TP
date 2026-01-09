<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{


    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $staff = Role::firstOrCreate(['name' => 'staff']);

        $allPermissions = Permission::all();

        // admin -> all permissions
        $admin->permissions()->sync($allPermissions->pluck('id'));

        // manager -> product and category permissions
        $managerPermissions = Permission::where('name', '!=', 'users.manage')->get();
        $manager->permissions()->sync($managerPermissions->pluck('id'));

        // staff -> create oonly
        $staffPermissions = Permission::whereIn('name', [
            'products.create',
            'category.create',
        ])->get();

        $staff->permissions()->sync($staffPermissions->pluck('id'));
    }
}
