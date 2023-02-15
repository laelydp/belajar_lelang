<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\RegisterController;

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

Route::resource('/barang', BarangController::class);

//untuk login
Route::get('login',
[LoginController::class, 'view'])->name('login')->middleware('guest');

// untuk proses login
Route::post('login',[LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

//route untuk logout
Route::get('logout',[LoginController::class, 'logout'])->name('logout-petugas');

//route registrasi
Route::get('registrasi',[RegisterController::class, 'register'])->name('register');
Route::post('registrasi',[RegisterController::class, 'store'])->name('register.store');

//route untuk dashboard
Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth', 'level:admin, petugas');
Route::get('dashboard/admin',[DashboardController::class, 'admin'])->name('dashboard.admin')->middleware('auth', 'level:admin, petugas');
Route::get('dashboard/petugas',[DashboardController::class, 'petugas'])->name('dashboard.petugas')->middleware('auth','level:petugas' );
// Route::get('dashboard/masyarakat',[DashboardController::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware('auth', 'level:masyarakat');

//route untuk lelang
Route::middleware(['auth', 'level:petugas'])->group (function () {
Route::resource('/lelang', LelangController::class);
});

Route::view('error/403', 'error.403')->name('error.403');
