<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\HistoryLelangController;

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
//untuk barang
Route::middleware(['auth', 'level:petugas,admin'])->group (function () {
Route::resource('/barang', BarangController::class);
});

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
Route::get('dashboard/admin',[DashboardController::class, 'admin'])->name('dashboard.admin')->middleware('auth', 'level:admin');
Route::get('dashboard/petugas',[DashboardController::class, 'petugas'])->name('dashboard.petugas')->middleware('auth','level:petugas,admin' );
 Route::get('dashboard/masyarakat',[DashboardController::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware('auth', 'level:masyarakat');

//route untuk lelang
Route::controller(LelangController::class)->group(function() {
    Route::get('petugas/lelang', 'index')->name('lelangpetugas.index')->middleware('auth', 'level:petugas');
    Route::get('petugas/lelang/create', 'create')->name('lelang.create')->middleware('auth', 'level:petugas');
    Route::post('petugas/lelang', 'store')->name('lelang.store')->middleware('auth', 'level:petugas');
    Route::get('/menawar/{lelang}', 'show')->name('lelangin.show')->middleware('auth','level:masyarakat');
    Route::get('/petugas/lelang/{lelang}', 'show')->name('lelangpetugas.show')->middleware('auth','level:petugas');
    Route::put('/petugas/lelang/{lelang}', 'update')->name('lelang.update')->middleware('auth','level:petugas');
    Route::get('/admin/lelang/{lelang}', 'show')->name('lelangadmin.show')->middleware('auth','level:admin');
    Route::get('/admin/lelang/', 'index')->name('lelangadmin.index')->middleware('auth','level:admin');
    Route::delete('/petugas/{lelang}/lelang/', 'destroy')->name('lelang.destroy')->middleware('auth','level:petugas');
});

//untuk users
Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('auth', 'level:admin');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth', 'level:admin');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store')->middleware('auth', 'level:admin');
Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth', 'level:admin');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth', 'level:admin');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth', 'level:admin');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth', 'level:admin');
Route::get('profile', [UserController::class, 'profile'])->name('profile.index')->middleware('auth','level:admin,petugas,masyarakat');
Route::post('profile/update', [UserController::class, 'updateprofile'])->name('user.updateprofile')->middleware('auth','level:admin,petugas,masyarakat');
Route::put('profile/update', [UserController::class, 'updateprofile'])->name('user.updateprofile')->middleware('auth','level:admin,petugas,masyarakat');
Route::get('profile', [UserController::class, 'editprofile'])->name('user.editprofile')->middleware('auth','level:admin,petugas,masyarakat');

//Route Error
Route::view('error/403', 'error.403')->name('error.403');

//Route Masyarakat
Route::get('data-penawaran-anda', [MasyarakatController::class, 'index'])->name('masyarakatlelang.index')->middleware('auth', 'level:masyarakat');
Route::resource('masyarakat', MasyarakatController::class)->middleware('auth',' level:admin');

//Untuk History Lelang
Route::controller(HistoryLelangController::class)->group(function() {
    Route::get('/menawar/{lelang}', 'create')->name('lelangg.create')->middleware('auth','level:masyarakat');
    Route::get('/data-penawaran', 'index')->name('datapenawar.index')->middleware('auth','level:petugas');
    Route::post('/menawar/{lelang}', 'store')->name('lelangin.store')->middleware('auth','level:masyarakat');
    Route::delete('/data-penawaran/{lelang}', 'destroy')->name('lelangin.destroy')->middleware('auth','level:petugas');
});
