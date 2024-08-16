<?php

namespace Database\Seeders;

use App\Models\BasicSalary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BasicSalary::insert([
            [
                'company_id' => 1,
                'user_id' => 1,
                'basic_salary' => 5000000,
            ],
            [
                'company_id' => 1,
                'user_id' => 2,
                'basic_salary' => 6000000,
            ]
        ]);
    }
}
