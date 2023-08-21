<?php

use App\Http\Controllers\ProductsController;
use App\Http\Middleware\EnsureDataIsValid;
use Pecee\SimpleRouter\SimpleRouter as Route;
use App\Http\Controllers\CategoriesController;

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');


Route::group(['middleware' => EnsureDataIsValid::class], function () {
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
});

