<?php

namespace App\Http\Controllers;

use App\Models\Category;
use http\Env\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

class CategoriesController extends Controller
{
    public function index(): void
    {
        echo $this->view->make('categories.index',[
            'categories' => Category::all()
        ])->render();
    }

    public function create(): void
    {
        echo $this->view->make('categories.create');
    }

    public function store(): void
    {
        Category::query()->create(input()->all());
        redirect('/categories');
    }
}