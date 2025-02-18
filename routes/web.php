<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemoniteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/clientregister', [LoginController::class, 'clientregister'])->name('clientregister');
Route::post('/saveregister', [LoginController::class, 'saveregister'])->name('saveregister');

// Dashboard Routes

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'Index'])->name('admin.dashboard');
    });
    Route::middleware(['role:SuperAdmin'])->group(function () {
        Route::get('/superadmin/dashboard', [AdminController::class, 'SuperAdmin'])->name('superadmin.dashboard');
    });

    Route::get('/admin/addmember', [AdminController::class, 'addmember'])->name('members.addmember');

    Route::post('savemember', [AdminController::class, 'savemember'])->name('savemember');

    Route::get('/admin/member', [AdminController::class, 'member'])->name('member');

// Handle the form submission and store the employee
Route::post('/add-employee', [AdminController::class, 'Store_employee'])->name('employees.store');



// Employees Routes
    Route::middleware(['role:Employee'])->group(function () {
        Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    });


Route::middleware(['auth'])->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/toggle', [AttendanceController::class, 'toggleAttendance'])->name('attendance.toggle');
});



// Clients Routes
    // Route::middleware(['role:Admin'])->group(function () {
    //     Route::get('/members/dashboard', [MemberController::class, 'index'])->name('members.dashboard');

    // });

   Route::get('/Demo/adddemo', [DemoniteController::class, 'adddemo'])->name('/Demo/adddemo');

   Route::post('/savedemo', [DemoniteController::class, 'savedemo'])->name('savedemo');

   Route::get('/demonitain', [DemoniteController::class, 'demonitain'])->name('demonitain');

});
