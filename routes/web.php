<?php

use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\InterviewScheduleController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveQuotaController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\UserController;
use App\Models\Attendance;
use App\Models\Designation;
use App\Models\InterviewSchedule;
use App\Services\AttendanceService;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/submit-login', [AuthController::class, 'Submitlogin'])->name('submit.login');

Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassoword'])->name('forget.password');
Route::post('/submit-forget-password', [ForgetPasswordController::class, 'SubmitForgetPassword'])->name('submit.forget.password');

Route::get('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/submit-reset-password', [ResetPasswordController::class, 'SubmitResetPassword'])->name('submit.reset.password');

Route::middleware('check.auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::prefix('Employee')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('employee.index');
        Route::get('/create', [UserController::class, 'create'])->name('employee.create');
        Route::post('/store', [UserController::class, 'store'])->name('employee.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('employee.edit');
        Route::post('/Update/{id}', [UserController::class, 'update'])->name('employee.update');
        Route::get('/Delete/{id}', [UserController::class, 'destroy'])->name('employee.delete');
        Route::get('/delete-document/{id}', [EmployeeService::class, 'delete_document'])->name('delete.document');
        Route::get('/profile/{id}', [EmployeeService::class, 'profile_page'])->name('employee.profile');
        Route::post('/update-personal-infomation', [EmployeeService::class, 'update_personal_information'])->name('update.personal.information');
        Route::post('/update-password', [EmployeeService::class, 'update_password'])->name('update.password');
        Route::post('/update-bank-details', [EmployeeService::class, 'bank_details'])->name('update.bank.details');
    });

    Route::prefix('Department')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/edit', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('/update', [DepartmentController::class, 'update'])->name('department.update');
        Route::get('/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
    });

    Route::prefix('Designation')->group(function () {
        Route::get('/', [DesignationController::class, 'index'])->name('designation.index');
        Route::post('/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('/edit', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::post('/update', [DesignationController::class, 'update'])->name('designation.update');
        Route::get('/delete/{id}', [DesignationController::class, 'destroy'])->name('designation.delete');
    });

    Route::prefix('Attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('/check-in', [AttendanceService::class, 'CheckIn'])->name('check.in');
        Route::get('/checkOut', [AttendanceService::class, 'CheckOut'])->name('check.out');
        Route::get('/get-attendance-data', [AttendanceController::class, 'show'])->name('get.attendance.data');
        Route::post('/update-attendance', [AttendanceController::class, 'markAttendance'])->name('attendance.update');
    });

    Route::prefix('Leaves')->group(function () {
        Route::get('/', [LeaveController::class, 'index'])->name('leave.index');
        Route::post('/mark-leave', [LeaveController::class, 'store'])->name('leave.store');
        Route::get('/delete-leave/{id}', [LeaveController::class, 'destroy'])->name('delete.leave');
        Route::get('/leave-quota', [LeaveQuotaController::class, 'index'])->name('leave.quota');
    });

    Route::prefix('Holiday')->group(function () {
        Route::get('/', [HolidayController::class, 'index'])->name('holiday.index');
        Route::post('/store', [HolidayController::class, 'store'])->name('holiday.store');
        Route::get('/edit', [HolidayController::class, 'edit'])->name('holiday.edit');
        Route::post('/update', [HolidayController::class, 'update'])->name('holiday.update');
        Route::get('/delete/{id}', [HolidayController::class, 'destroy'])->name('holiday.delete');
    });

    Route::prefix('Allowance')->group(function () {
        Route::get('/', [AllowanceController::class, 'index'])->name('allowance.index');
        Route::post('/store', [AllowanceController::class, 'store'])->name('allowance.store');
        Route::get('/delete/{id}', [AllowanceController::class, 'destroy'])->name('allowance.delete');
    });
    Route::prefix('payslip')->group(function () {
        Route::get('/', [PayslipController::class, 'index'])->name('payslip.index');
        Route::post('/download-payslip', [PayslipController::class, 'downloadPaySlip'])->name('download.payslip.index');
    });
    Route::prefix('Setting')->group(function () {
        Route::prefix('Deduction')->group(function () {
            Route::get('/', [DeductionController::class, 'index'])->name('deduction.index');
            Route::get('/edit', [DeductionController::class, 'edit'])->name('deduction.edit');
            Route::post('/update', [DeductionController::class, 'update'])->name('deduction.update');
        });
    });

    Route::prefix('Candidate')->group(function () {
        Route::get('/', [CandidateController::class, 'index'])->name('candidate.index');
        Route::post('/store', [CandidateController::class, 'store'])->name('candidate.store');
        Route::get('/show', [CandidateController::class, 'show'])->name('candidate.show');
        Route::get('/edit', [CandidateController::class, 'edit'])->name('candidate.edit');
        Route::post('/update/{id}', [CandidateController::class, 'update'])->name('candidate.update');
        Route::get('/delete/{id}', [CandidateController::class, 'destroy'])->name('candidate.delete');
    });

    Route::prefix('interview-schedule')->group(function () {
        Route::get('/', [InterviewScheduleController::class, 'index'])->name('interview.schedule.index');
        Route::post('/store', [InterviewScheduleController::class, 'store'])->name('interview.schedule.store');
        Route::get('/edit', [InterviewScheduleController::class, 'edit'])->name('interview.schedule.edit');
        Route::get('/update/{id}', [InterviewScheduleController::class, 'update'])->name('interview.schedule.update');
        Route::get('/delete/{id}', [InterviewScheduleController::class, 'destroy'])->name('interview.schedule.destroy');
    });


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
