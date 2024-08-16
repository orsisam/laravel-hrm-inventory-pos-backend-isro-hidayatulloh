<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'company_id' => 1,
                'name' => 'IT',
                'created_by' => 1,
                'description' => 'IT department',
            ],
            [
                'company_id' => 1,
                'name' => 'HR',
                'created_by' => 1,
                'description' => 'HR department',
            ]
        ]);
    }
}
