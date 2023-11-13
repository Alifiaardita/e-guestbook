<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RekapController;

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

Route::get('/',[LoginController::class, 'index'])->name('login');
Route::post('/',[LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/admin',[AdminController::class, 'index'])->name('admin');
    Route::post('/admin',[AdminController::class, 'store'])->name('admin.store');
    Route::get('/rekapitulasi',[RekapController::class, 'index'])->name('rekapitulasi');
    Route::post('/rekapitulasi-cetak',[RekapController::class, 'cetak'])->name('rekapitulasi.cetak');


});
