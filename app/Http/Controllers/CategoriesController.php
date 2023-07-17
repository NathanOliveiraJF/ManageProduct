<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(): void
    {
        echo $this->view->make('categories.index',[
            'categories' => Category::all()
        ])->render();
    }
}