<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CategoryController::class, 'home'])->name('home');

Route::redirect('/home', '/');

Auth::routes();

Route::prefix('home')->group(function () {

    Route::get('/profile', [HomeController::class, 'profile'])->middleware(['auth'])->name('profile');
    Route::post('/profile/update', [HomeController::class, 'profileUpdated'])->name('profileUpdated');

});

Route::get('/categories/{category}', [CategoryController::class, 'category'])->name('category');

Route::post('/add', [BasketController::class, 'add'])->name('addProduct');
Route::post('/remove', [BasketController::class, 'remove'])->name('removeProduct');

Route::prefix('basket')->group(function () {
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    Route::get('/getProductsQuantity', [BasketController::class, 'getProductsQuantity']);
    Route::post('/createOrder', [BasketController::class, 'createOrder'])->name('createOrder');

});

Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/user', [AdminController::class, 'getUser'])->name('admin.user');    
    Route::get('/enterAsUser/{userId}', [AdminController::class, 'enterAsUser'])->name('enterAsUser');

    Route::prefix('category')->group(function () {
        Route::get('/', [AdminController::class, 'getCategory'])->name('admin.category');
        Route::get('/categoryCreated', [AdminController::class, 'categoryCreated'])->name('categoryCreated');
        Route::post('/addCategories', [AdminController::class, 'addCategories'])->name('addCategories');
        Route::post('/exportCategories', [AdminController::class, 'exportCategories'])->name('exportCategories');
        Route::post('/importCategories', [AdminController::class, 'importCategories'])->name('importCategories');
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminController::class, 'getProduct'])->name('admin.product');
        Route::get('/productCreated', [AdminController::class, 'productCreated'])->name('productCreated');
        Route::post('/addProducts', [AdminController::class, 'addProducts'])->name('addProducts');
        Route::post('/exportProducts', [AdminController::class, 'exportProducts'])->name('exportProducts');        
        Route::post('/importProducts', [AdminController::class, 'importProducts'])->name('importProducts');
    });
});