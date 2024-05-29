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

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin',[AdminController::class,'index'])->name('admin');

// Route::get('/user',[AdminController::class,'user'])->name('user');
// Route::get('user/{user}/edituser', [AdminController::class, 'edituser'])->name('edituser');
// Route::put('user/{user}', [AdminController::class, 'updateuser'])->name('updateuser');
// Route::delete('user/{user}', [AdminController::class, 'deleteuser'])->name('deleteuser');
// Route::get('/tambahuser',[AdminController::class,'tambahuser'])->name('tambahuser');
// Route::post('/user/storeuser',[AdminController::class,'storeuser'])->name('storeuser'); // Add a named route for clarity
// Route::delete('user/{user}', [AdminController::class, 'deleteuser'])->name('deleteuser');


// Route::get('/laporan', [AdminController::class, 'showLaporan'])->name('laporan');
// Route::post('/pesanan/{id}/lunas', [AdminController::class, 'markAsPaid'])->name('pesanan.lunas');

// Route::get('/produk',[AdminController::class,'produk'])->name('produk');
// Route::get('produk/{produk}/editproduk', [AdminController::class, 'editproduk'])->name('editproduk');
// Route::put('produk/{produk}', [AdminController::class, 'updateproduk'])->name('updateproduk');
// Route::delete('produk/{produk}', [AdminController::class, 'deleteproduk'])->name('deleteproduk');
// Route::get('/tambahproduk',[AdminController::class,'tambahproduk'])->name('tambahproduk');
// Route::post('/produk/storeproduk',[AdminController::class,'storeproduk'])->name('storeproduk');
// Route::delete('produk/{produk}', [AdminController::class, 'deleteproduk'])->name('deleteproduk');

// Route::get('/pesanan', [AdminController::class, 'pesanan'])->name('pesanan');
// Route::get('pesanan/{pesanan}/detailpesanan', [AdminController::class, 'detailpesanan'])->name('detailpesanan');
// Route::put('pesanan/{pesanan}', [AdminController::class, 'updatepesanan'])->name('updatepesanan');
// Route::delete('pesanan/{pesanan}', [AdminController::class, 'deletepesanan'])->name('deletepesanan');
// // Route::get('/tambahpesanan',[AdminController::class,'tambahproduk'])->name('tambahproduk');
// Route::post('/pesanan/storepesanan', [AdminController::class, 'storepesanan'])->name('storepesanan');
// Route::delete('pesanan/{pesanan}', [AdminController::class, 'deletepesanan'])->name('deletepesanan');





// Route::get('/dataadmin',[AdminController::class,'dataadmin'])->name('dataadmin');
// Route::get('dataadmin/{admin}/editadmin', [AdminController::class, 'editadmin'])->name('editadmin');
// Route::put('dataadmin/{admin}', [AdminController::class, 'update'])->name('update');
// Route::delete('dataadmin/{admin}', [AdminController::class, 'delete'])->name('delete');
// Route::get('/tambahadmin',[AdminController::class,'tambahadmin'])->name('tambahadmin');
// Route::post('/dataadmin/store',[AdminController::class,'store']);



// Route::get('/kategori',[AdminController::class,'kategori'])->name('kategori');
// Route::get('kategori/{kategori}/editkategori', [AdminController::class, 'editkategori'])->name('editkategori');
// Route::put('kategori/{kategori}', [AdminController::class, 'updatekategori'])->name('updatekategori');
// Route::delete('kategori/{kategori}', [AdminController::class, 'deletekategori'])->name('deletekategori');
// Route::get('/tambahkatgeori',[AdminController::class,'tambahkategori'])->name('tambahkategori');
// Route::post('/kategori/storekategori', [AdminController::class, 'storekategori'])->name('storekategori');



// Route::get('/profile',[AdminController::class,'profile'])->name('profile');
// });

Route::get('/admin',[AdminController::class,'index'])->name('admin');

Route::get('/user',[AdminController::class,'user'])->name('user');
Route::get('user/{user}/edituser', [AdminController::class, 'edituser'])->name('edituser');
Route::put('user/{user}', [AdminController::class, 'updateuser'])->name('updateuser');
Route::delete('user/{user}', [AdminController::class, 'deleteuser'])->name('deleteuser');
Route::get('/tambahuser',[AdminController::class,'tambahuser'])->name('tambahuser');
Route::post('/user/storeuser',[AdminController::class,'storeuser'])->name('storeuser'); // Add a named route for clarity
Route::delete('user/{user}', [AdminController::class, 'deleteuser'])->name('deleteuser');


Route::get('/laporan', [AdminController::class, 'showLaporan'])->name('laporan');
Route::post('/pesanan/{id}/lunas', [AdminController::class, 'markAsPaid'])->name('pesanan.lunas');

Route::get('/produk',[AdminController::class,'produk'])->name('produk');
Route::get('produk/{produk}/editproduk', [AdminController::class, 'editproduk'])->name('editproduk');
Route::put('produk/{produk}', [AdminController::class, 'updateproduk'])->name('updateproduk');
Route::delete('produk/{produk}', [AdminController::class, 'deleteproduk'])->name('deleteproduk');
Route::get('/tambahproduk',[AdminController::class,'tambahproduk'])->name('tambahproduk');
Route::post('/produk/storeproduk',[AdminController::class,'storeproduk'])->name('storeproduk');
Route::delete('produk/{produk}', [AdminController::class, 'deleteproduk'])->name('deleteproduk');

Route::get('/pesanan', [AdminController::class, 'pesanan'])->name('pesanan');
Route::get('pesanan/{pesanan}/detailpesanan', [AdminController::class, 'detailpesanan'])->name('detailpesanan');
Route::put('pesanan/{pesanan}', [AdminController::class, 'updatepesanan'])->name('updatepesanan');
Route::delete('pesanan/{pesanan}', [AdminController::class, 'deletepesanan'])->name('deletepesanan');
// Route::get('/tambahpesanan',[AdminController::class,'tambahproduk'])->name('tambahproduk');
Route::post('/pesanan/storepesanan', [AdminController::class, 'storepesanan'])->name('storepesanan');
Route::delete('pesanan/{pesanan}', [AdminController::class, 'deletepesanan'])->name('deletepesanan');





Route::get('/dataadmin',[AdminController::class,'dataadmin'])->name('dataadmin');
Route::get('dataadmin/{admin}/editadmin', [AdminController::class, 'editadmin'])->name('editadmin');
Route::put('dataadmin/{admin}', [AdminController::class, 'update'])->name('update');
Route::delete('dataadmin/{admin}', [AdminController::class, 'delete'])->name('delete');
Route::get('/tambahadmin',[AdminController::class,'tambahadmin'])->name('tambahadmin');
Route::post('/dataadmin/store',[AdminController::class,'store']);



Route::get('/kategori',[AdminController::class,'kategori'])->name('kategori');
Route::get('kategori/{kategori}/editkategori', [AdminController::class, 'editkategori'])->name('editkategori');
Route::put('kategori/{kategori}', [AdminController::class, 'updatekategori'])->name('updatekategori');
Route::delete('kategori/{kategori}', [AdminController::class, 'deletekategori'])->name('deletekategori');
Route::get('/tambahkatgeori',[AdminController::class,'tambahkategori'])->name('tambahkategori');
Route::post('/kategori/storekategori', [AdminController::class, 'storekategori'])->name('storekategori');



Route::get('/profile',[AdminController::class,'profile'])->name('profile');

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/proseslogin',[LoginController::class,'proseslogin'])->name('proseslogin');


Route::get('/register',[RegisterController::class,'register'])->name('register');