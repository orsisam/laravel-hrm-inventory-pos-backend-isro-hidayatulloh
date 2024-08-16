<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'company_id' => 1,
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Administrator role',
            ],
            [
                'company_id' => 1,
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Staff role',
            ]
        ]);
    }
}
