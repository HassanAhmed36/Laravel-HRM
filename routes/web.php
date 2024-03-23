<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UserController;
use App\Models\Designation;
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

    Route::get('/employee', [UserController::class, 'index'])->name('employee.index');
    Route::get('/employee-create', [UserController::class, 'create'])->name('employee.create');
    Route::post('/submit-employee', [UserController::class, 'store'])->name('employee.store');
    Route::get('/edit-employee/{id}', [UserController::class, 'edit'])->name('employee.edit');
    Route::post('/Update-employee/{id}', [UserController::class, 'update'])->name('employee.update');
    Route::get('/Delete-employee/{id}', [UserController::class, 'destroy'])->name('employee.delete');
    Route::get('/delete-document/{id}', [EmployeeService::class, 'delete_document'])->name('delete.document');

    Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('/department-store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department-edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');

    Route::post('/department-update', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/department-delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');

    Route::get('/designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::post('/designation-store', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('/designation-edit', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('/designation-update', [DesignationController::class, 'update'])->name('designation.update');
    Route::get('/designation-delete/{id}', [DesignationController::class, 'destroy'])->name('designation.delete');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
