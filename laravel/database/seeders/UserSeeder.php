<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $managerRole = Role::where('name', 'manager')->firstOrFail();
        $staffRole = Role::where('name', 'staff')->firstOrFail();

        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $admin->roles()->sync([$adminRole->id]);

        // Manager
        $manager = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Manager User',
                'password' => Hash::make('password'),
            ]
        );
        $manager->roles()->sync([$managerRole->id]);

        // Staff
        for ($i = 1; $i <= 2; $i++) {
            $staff = User::firstOrCreate(
                ['email' => "staff{$i}@example.com"],
                [
                    'name' => "Staff User {$i}",
                    'password' => Hash::make('password'),
                ]
            );
            $staff->roles()->sync([$staffRole->id]);
        }
    }
}
