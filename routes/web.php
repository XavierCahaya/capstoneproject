<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\OrderInController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\CekpesananController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderProcessController;
use App\Http\Controllers\OrderCompleteController;

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

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login', [LoginController::class,'login'])->name('login.action');
    Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::get('/', [profilecontroller::class, 'index'])->name('beranda');
Route::get('/admin', [OrderInController::class, 'index']);
Route::get('/OrderIn', [OrderInController::class, 'index']);
Route::get('/OrderProcess', [OrderProcessController::class, 'index']);
Route::get('/OrderDetail', [OrderDetailController::class, 'index']);    
Route::get('/OrderComplete', [OrderCompleteController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/menu', [ProductController::class,'index'])->name('product');
    Route::post('/checkout', [OrderController::class,'checkout'])->name('checkout');
    Route::get('/cekpesanan', [CekpesananController::class, 'index'])->name('cekpesanan');
    Route::get('category', [CategoryController::class, 'user'])->name('category.index');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
});

Route::middleware(['web', 'auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('cms')->group(function () {
        Route::prefix('product')->group(function () {
            Route::prefix('sub-product')->group(function () {
                Route::get('/product', [AdminMenuController::class, 'semua'])->name('semua.menu');
                Route::get('/product/makanan', [AdminMenuController::class, 'makanan'])->name('makanan.menu');
                Route::get('/product/minuman', [AdminMenuController::class, 'minuman'])->name('minuman.menu');
                Route::get('/product/snack', [AdminMenuController::class, 'snack'])->name('snack.menu');
            });
            Route::get('/product/create', [AdminMenuController::class, 'create'])->name('form.create.product');
            Route::post('/product', [AdminMenuController::class, 'store'])->name('add.product');
            Route::get('/product/update/{id}', [AdminMenuController::class, 'edit'])->name('form.update.product');
            Route::put('/product/{id}', [AdminMenuController::class, 'update'])->name('update.product');
            Route::get('/product/delete/{id}', [AdminMenuController::class, 'destroy'])->name('delete.product');
        });

        Route::prefix('category')->group(function () {
            Route::get('/category', [CategoryController::class, 'index'])->name('category.menu');
            Route::get('/category/create', [CategoryController::class, 'create'])->name('form.create.category');
            Route::post('/category', [CategoryController::class, 'store'])->name('add.category');
            Route::get('/category/update/{id}', [CategoryController::class, 'edit'])->name('form.update.category');
            Route::put('/category/{id}', [CategoryController::class, 'update'])->name('update.category');
            Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
        });

    });

    Route::prefix('promo')->group(function () {
        Route::get('/index', [PromoController::class, 'index'])->name('semua.promo');
        Route::get('/promo/create', [PromoController::class, 'create'])->name('form.create.promo');
        Route::post('/promo', [PromoController::class, 'store'])->name('add.promo');
        Route::get('/promo/update/{id}', [PromoController::class, 'edit'])->name('form.update.promo');
        Route::put('/promo/{id}', [PromoController::class, 'update'])->name('update.promo');
        Route::get('/promo/delete/{id}', [PromoController::class, 'destroy'])->name('delete.promo');
    });

});