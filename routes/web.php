<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AttendanceRecordController;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/store', [HomeController::class, 'store'])->name('attendanceRecord.store');
    Route::put('/update', [HomeController::class, 'update'])->name('attendanceRecord.update');

    Route::get('/setting', [SettingController::class, 'create'])->name('setting.create');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
    Route::patch('/setting/update', [SettingController::class, 'update'])->name('setting.update');

    Route::get('/attendance', [AttendanceRecordController::class, 'index'])->name('attendanceRecord.index');
    Route::get('/export', [AttendanceRecordController::class, 'export'])->name('attendanceRecord.export');

});

Auth::routes();