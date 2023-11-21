<?php

use App\Http\Controllers\OrderInController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CekpesananController;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\CategoryController;

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


Route::get('/admin', [OrderInController::class, 'index']);
Route::get('/OrderIn', [OrderInController::class, 'index']);



Route::prefix('user')->group(function () {
    Route::get('/menu', [ProductController::class,'index'])->name('product');
    Route::get('/cekpesanan', [CekpesananController::class, 'index'])->name('cekpesanan');
});

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');

