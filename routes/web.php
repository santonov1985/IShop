<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Color\ColorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Brands\BrandController;

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

Route::get('/', [IndexController::class, 'index'])->name('main');

//Users
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('/{id}', [UserController::class, 'delete'])->name('delete');
});

//Categories
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('update');
    Route::get('/{id}', [CategoryController::class, 'delete'])->name('delete');
});

//Tags
Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::post('/store', [TagController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [TagController::class, 'update'])->name('update');
    Route::get('/{id}', [TagController::class, 'delete'])->name('delete');
});

//Brands
Route::prefix('brands')->name('brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::post('/store', [BrandController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [BrandController::class, 'update'])->name('update');
    Route::get('/{id}', [BrandController::class, 'delete'])->name('delete');
});

//Colors
Route::prefix('colors')->name('colors.')->group(function () {
    Route::get('/', [ColorController::class, 'index'])->name('index');
    Route::get('/create', [ColorController::class, 'create'])->name('create');
    Route::post('/store', [ColorController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ColorController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ColorController::class, 'update'])->name('update');
    Route::get('/{id}', [ColorController::class, 'delete'])->name('delete');
});

//Products
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ProductController::class, 'update'])->name('update');
    Route::get('/{id}', [ProductController::class, 'delete'])->name('delete');
});
