<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
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
        $this->call(DepartmentAndDesignationSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(EmployeeSeeder::class);
        // $this->call(AttendanceSeeder::class);
        $this->call(DeductionSeeder::class);
        // $this->call(JobSeeder::class);
        $this->call(CandidateSeeder::class);
    }
}
