<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ProductsController extends Controller
{
    public function create(): void
    {
        echo $this->view->make('products.create', [
            'categories' => Category::all()
        ])->render();
    }
}