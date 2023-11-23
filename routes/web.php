<?php

use App\Src\Product\Http\Controllers\ProductsController;
use App\Src\Category\Http\Controllers\CategoriesController;
use App\Src\Dashboard\Http\Controllers\DashboardController;
use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
Route::delete('/products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');