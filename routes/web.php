<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChekoutController;

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
// landing page 
Route::get('/landing', [LandingController::class,"index"])->name("home");
// Product
Route::get('/product', [ProductsController::class, 'index'])->name('Product');
//auth
Route::get('/login', [AuthController::class,'login'])->name('login.create');
Route::post('/login',[AuthController::class,'auth'])->name('login.store');
Route::get('/register',[AuthController:: class,'register'])->name('register.create');
Route::post('/register',[AuthController::class,'registeruser'])->name('register.store');
Route::get('/logut', [AuthController::class,'logout'])->name('logout');

// dashboard
Route::prefix('dashboard')->middleware('authentication')->group(function () {

    //user
    Route::prefix('users')->middleware('role:superadmin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profil', [UserController::class, 'profil'])->name('profil');
        Route::get('/checkout', [ChekoutController::class, 'checkout'])->name('checkout.create');
        Route::get('/checkout/transaction', [ChekoutController::class, 'transaction'])->name('checkout.store');

    });
    //admin
    Route::prefix('product')->middleware('role:superadmin|user')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    });
    
    //admin
    Route::prefix('product')->middleware('role:superadmin')->group(function () {
        Route::get('/form/product', [AdminController::class, 'form'])->name('form.create');
        Route::post('/form/create', [AdminController::class, 'formCreate'])->name('form.store');
        Route::get('/product/list', [AdminController::class, 'MenageProduct'])->name('product.manage');
        Route::get('/edit/{id}', [AdminController::class, 'editProduct'])->name('product.edit');
        Route::put('/update/{id}', [AdminController::class, 'updateProduct'])->name('product.update');
        Route::post('/delete/{id}', [AdminController::class, 'deleteProduct'])->name('product.delete');
        Route::get('/export', [AdminController::class, 'export'])->name('export');
        Route::post('/import', [AdminController::class, 'import'])->name('import.create');
        Route::get('/getdatatable', [AdminController::class, 'getdatatable'])->name('data.table');
        Route::get('/checkout', [ChekoutController::class, 'checkout'])->name('checkout.create');
    });

});






