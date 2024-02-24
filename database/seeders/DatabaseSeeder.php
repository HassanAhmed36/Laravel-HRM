<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeBasicInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $department = Department::create([
            'name' => 'Adminstration'
        ]);
        $designation = Designation::create([
            'name' => 'Admin',
            'department_id' => $department->id
        ]);

        $user = User::create([
            'name' => 'Admin',
            'Emp_Id' => 'EMP-1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'is_active' => true,
            'designation_id' => $designation->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
