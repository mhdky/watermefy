<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\SetingController;
use App\Http\Controllers\TenantDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// add penyewa
Route::post('/9r2jfwdjsaf0', [DashboardController::class, 'store'])->middleware('auth');
// add pay
Route::post('/ijqdwf03fjids', [DashboardController::class, 'storePay'])->middleware('auth');

// edit penyewa
Route::get('/admin/tenant/{tenant:id}/edit', [TenantDashboardController::class, 'edit'])->middleware('auth');
Route::put('/9r2jfwdjsaf0/{tenant:id}', [TenantDashboardController::class, 'update'])->middleware('auth');
// edit pay
Route::get('/admin/pay/{pay:id}/edit', [PayController::class, 'edit'])->middleware('auth');
Route::put('/ijqdwf03fjids/{pay:id}', [PayController::class, 'update'])->middleware('auth');

// hapus penyewa
Route::delete('/9r2jfwdjsaf0/{tenant:id}', [DashboardController::class, 'destroy'])->middleware('auth');
// hapus pay
Route::delete('/ijqdwf03fjids/{pay:id}', [DashboardController::class, 'destroyPay'])->middleware('auth');

// user edit name dan email
Route::get('/admin/setting', [SetingController::class, 'edit'])->middleware('auth')->name('user.edit');
Route::put('/admin/setting', [SetingController::class, 'update'])->middleware('auth')->name('user.update');

// user edit password
Route::put('/user/password', [SetingController::class, 'updatePassword'])->middleware('auth')->name('user.update.password');
require __DIR__.'/auth.php';
