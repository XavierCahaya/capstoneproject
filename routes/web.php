<?php

<<<<<<< HEAD
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
=======
use App\Http\Controllers\CekpesananController;
>>>>>>> 591479acd6ae8c9c9067a887f9266a088bcc721a
use Illuminate\Support\Facades\Route;
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

<<<<<<< HEAD
Route::get('/', [profilecontroller::class, 'index']);

Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/menu', [ProductController::class,'index'])->name('product');
=======
Route::get('/', [profilecontroller::class, 'index'])->name('beranda');

Route::prefix('user')->group(function () {
    Route::get('/cekpesanan', [CekpesananController::class, 'index'])->name('cekpesanan');
});
>>>>>>> 591479acd6ae8c9c9067a887f9266a088bcc721a
