<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name' => 'employee_view'],
            ['name' => 'employee_create'],
            ['name' => 'employee_update'],
            ['name' => 'employee_delete'],
            ['name' => 'employee_detail'],
            ['name' => 'department_view'],
            ['name' => 'department_create'],
            ['name' => 'department_update'],
            ['name' => 'department_delete'],
            ['name' => 'designation_view'],
            ['name' => 'designation_create'],
            ['name' => 'designation_update'],
            ['name' => 'designation_delete'],
            ['name' => 'attendance_view'],
            ['name' => 'attendance_update'],
            ['name' => 'leave_view'],
            ['name' => 'leave_create'],
            ['name' => 'leave_quota_view'],
            ['name' => 'holiday_view'],
            ['name' => 'holiday_create'],
            ['name' => 'holiday_update'],
            ['name' => 'holiday_delete'],
            ['name' => 'allowance_view'],
            ['name' => 'allowance_create'],
            ['name' => 'allowance_delete'],
            ['name' => 'payslip_view'],
            ['name' => 'candidate_view'],
            ['name' => 'candidate_create'],
            ['name' => 'candidate_update'],
            ['name' => 'candidate_delete'],
            ['name' => 'interview_schedule_view'],
            ['name' => 'interview_schedule_create'],
            ['name' => 'interview_schedule_update'],
            ['name' => 'interview_schedule_delete'],
            ['name' => 'notice_board_view'],
            ['name' => 'notice_board_create'],
            ['name' => 'notice_board_update'],
            ['name' => 'notice_board_delete'],
            ['name' => 'setting'],
            ['name' => 'MyAttendance'],
            ['name' => 'MyPayslip'],
            ['name' => 'LeaveRequest'],
            ['name' => 'leave_delete'],
            ['name' => 'deduction_setting_view'],
            ['name' => 'deduction_setting_update'],
        ]);
        $permissions = Permission::all();
        Designation::find(1)->permissions()->attach($permissions->pluck('id'));
        Designation::find(2)->permissions()->attach($permissions->pluck('id'));
    }
}
