<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentAndDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = Department::insert([
            ['name' => 'Adminstration', 'is_active' => 1],
            ['name' => 'Human Resources', 'is_active' => 1],
            ['name' => 'Developement', 'is_active' => 1],
        ]);
        $designation = Designation::insert([
            ['name' => 'Admin', 'department_id' => 1,  'is_active' => 1],
            ['name' => 'HR', 'department_id' => 2,  'is_active' => 1],
            ['name' => 'Backend Developer', 'department_id' => 3,  'is_active' => 1],
            ['name' => 'Wordpress Developer', 'department_id' => 3,  'is_active' => 1],
        ]);

    }
}
