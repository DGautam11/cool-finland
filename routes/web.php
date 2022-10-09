<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::post('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/employees', [EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class,'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [EmployeeController::class,'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class,'update'])->name('employees.update');
Route::delete('employees/{employee}', [EmployeeController::class,'destroy'])->name('employees.destroy');
