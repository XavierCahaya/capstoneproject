<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\OrderInController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CekpesananController;
use App\Http\Controllers\profilecontroller;

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


Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/', [profilecontroller::class, 'index'])->name('beranda');

Route::prefix('user')->group(function () {
    Route::get('/menu', [ProductController::class,'index'])->name('product');
    Route::get('/cekpesanan', [CekpesananController::class, 'index'])->name('cekpesanan');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('cms')->group(function () {

        Route::prefix('product')->group(function () {
            Route::prefix('sub-product')->group(function () {
                Route::get('/product', [AdminMenuController::class, 'semua'])->name('semua.menu');
                Route::get('/product/makanan', [AdminMenuController::class, 'makanan'])->name('makanan.menu');
                Route::get('/product/minuman', [AdminMenuController::class, 'minuman'])->name('minuman.menu');
                Route::get('/product/snack', [AdminMenuController::class, 'snack'])->name('snack.menu');
            });
            Route::post('/product', [AdminMenuController::class, 'store'])->name('add.product');
            Route::put('/product/{id}', [AdminMenuController::class, 'update'])->name('update.product');
            Route::delete('/product/delete/{id}', [AdminMenuController::class, 'destroy'])->name('delete.product');
        });

    });

});
