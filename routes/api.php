<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DesignationController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\LeaveTypeController;
use App\Http\Controllers\Api\RoleController;
use App\Models\BasicSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::apiResource('/roles', RoleController::class);
        Route::apiResource('/departments', DepartmentController::class);
        Route::apiResource('/designations', DesignationController::class);
        Route::apiResource('/shifts', DepartmentController::class);
        Route::apiResource('/basic-salaries', BasicSalary::class);
        Route::apiResource('/holdays', HolidayController::class);
        Route::apiResource('/leave-types', LeaveTypeController::class);
        Route::apiResource('/leaves', LeaveController::class);
        Route::apiResource('/attendances', AttendanceController::class);
    });
});
