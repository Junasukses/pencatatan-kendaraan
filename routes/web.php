<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\JenisKndrnController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ServiceController;

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
    return view('/auth/login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin', 'index');
        Route::resource('driver', DriverController::class);
        Route::resource('jenis', JenisKndrnController::class);
        Route::resource('kendaraan', KendaraanController::class);
        Route::controller(ServiceController::class)->group(function(){
            Route::get('/service', 'index');
            Route::get('/service/{id}', 'tambahjadwal');
            Route::get('/service/{id}/edit', 'edit');
            Route::post('/service/{id}', 'store');
            Route::put('/service/{id}', 'update');
            Route::delete('/service/{id}', 'destroy');
        });
        Route::controller(PermintaanController::class)->group(function(){
            Route::get('/permintaan', 'index');
            Route::get('/permintaan/create', 'create');
            Route::post('/permintaan', 'store');
            Route::get('/permintaan/{id}', 'show');
            Route::put('/permintaan/{id}', 'update');
            Route::delete('/permintaan/{id}', 'destroy');
        });
    });
});
Route::middleware(['auth', 'role:atasan'])->group(function () {
    Route::controller(AtasanController::class)->group(function(){
        Route::get('/atasan', 'index');
        Route::get('/atasan/{id}', 'show');
        Route::put('/atasan/{id}', 'update');
    });    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
