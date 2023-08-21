<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\EnsureDataIsValid;
use Pecee\SimpleRouter\SimpleRouter as Route;
use App\Http\Controllers\CategoriesController;

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