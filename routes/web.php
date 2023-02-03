<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabelBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::resource('/barang', TabelBarangController::class);

//untuk login
Route::get('/login', 
[LoginController::class, 'view'])->name('/login')->middleware('guest');
// untuk proses login
Route::post('/login',[LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

Route::get('dashboard/admin',[DashboardController::class, 'admin'])->name('dashboard.admin')->middleware('auth', 'level:admin, petugas');
Route::get('dashboard/petugas',[DashboardController::class, 'petugas'])->name('dashboard.petugas')->middleware('auth','level:petugas' ); 
Route::get('dashboard/masyarakat',[DashboardController::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware('auth', 'level:masyarakat');

Route::view('error/403', 'error.403')->name('error.403');