<?php

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

Route::get('/admin', function(){
    return view('admin/orderIn');
});
