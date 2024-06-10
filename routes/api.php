<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ApiAdminController::class, 'index']);

    Route::get('/users', [ApiAdminController::class, 'user']);
    Route::get('/users/{user}/edit', [ApiAdminController::class, 'edituser']);
    Route::put('/users/{user}', [ApiAdminController::class, 'updateuser']);
    Route::delete('/users/{user}', [ApiAdminController::class, 'deleteuser']);
    Route::get('/users/add', [ApiAdminController::class, 'tambahuser']);
    Route::post('/users/store', [ApiAdminController::class, 'storeuser']);

    Route::get('/laporans', [ApiAdminController::class, 'showLaporan']);
    Route::post('/pesanans/{id}/paid', [ApiAdminController::class, 'markAsPaid']);

    Route::get('/products', [ApiAdminController::class, 'produk']);
    Route::get('/products/{produk}/edit', [ApiAdminController::class, 'editproduk']);
    Route::put('/products/{produk}', [ApiAdminController::class, 'updateproduk']);
    Route::delete('/products/{produk}', [ApiAdminController::class, 'deleteproduk']);
    Route::get('/products/add', [ApiAdminController::class, 'tambahproduk']);
    Route::post('/products/store', [ApiAdminController::class, 'storeproduk']);

    Route::get('/orders', [ApiAdminController::class, 'pesanan']);
    Route::get('/orders/{pesanan}/details', [ApiAdminController::class, 'detailpesanan']);
    Route::delete('/orders/{pesanan}', [ApiAdminController::class, 'deletepesanan']);
    Route::post('/orders/store', [ApiAdminController::class, 'storepesanan']);

    Route::get('/admins', [ApiAdminController::class, 'dataadmin']);
    Route::get('/admins/{admin}/edit', [ApiAdminController::class, 'editadmin']);
    Route::put('/admins/{admin}', [ApiAdminController::class, 'update']);
    Route::delete('/admins/{admin}', [ApiAdminController::class, 'delete']);
    Route::get('/admins/add', [ApiAdminController::class, 'tambahadmin']);
    Route::post('/admins/store', [ApiAdminController::class, 'store']);

    Route::get('/categories', [ApiAdminController::class, 'kategori']);
    Route::get('/categories/{kategori}/edit', [ApiAdminController::class, 'editkategori']);
    Route::put('/categories/{kategori}', [ApiAdminController::class, 'updatekategori']);
    Route::delete('/categories/{kategori}', [ApiAdminController::class, 'deletekategori']);
    Route::get('/categories/add', [ApiAdminController::class, 'tambahkategori']);
    Route::post('/categories/store', [ApiAdminController::class, 'storekategori']);

    Route::get('/profile', [ApiAdminController::class, 'profile']);