<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UserController;
use App\Models\Attendance;
use App\Models\Designation;
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


        Route::get('/get-attendance-data' , [AttendanceService::class , 'getAttendanceData'])->name('get.attendance.data');
        Route::post('/update-attendance' , [AttendanceService::class , 'markAttendance'])->name('attendance.update');
    });


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
