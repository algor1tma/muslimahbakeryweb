<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/penjualan',[AdminController::class,'penjualan'])->name('penjualan');
Route::get('/laporan',[AdminController::class,'laporan'])->name('laporan');
Route::get('/produk',[AdminController::class,'produk'])->name('produk');
Route::get('/transaksi',[AdminController::class,'transaksi'])->name('transaksi');
Route::get('/dataadmin',[AdminController::class,'dataadmin'])->name('dataadmin');
Route::get('/',[LoginController::class,'login'])->name('login');
Route::get('/register',[RegisterController::class,'register'])->name('register');
