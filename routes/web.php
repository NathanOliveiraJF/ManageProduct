<?php

use Pecee\SimpleRouter\SimpleRouter as Route;
use App\Http\Controllers\CategoriesController;

Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');