<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index(): void
    {
        $quantityProduct =  Product::query()->count();
        $products = Product::all();
       echo $this->view()->make('dashboard.index', [
           'quantityProduct' => $quantityProduct,
           'products' => $products
       ])->render();
    }
}