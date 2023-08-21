<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Pecee\SimpleRouter\SimpleRouter as Router;

class CategoriesController extends Controller
{
    public function index(): void
    {
        echo $this->view()->make('categories.index',[
            'categories' => Category::all()
        ])->render();
    }

    public function create(): void
    {
        echo $this->view()->make('categories.create');
    }

    public function store(): void
    {
        Category::query()->create(input()->all());
        redirect('/categories');
    }

    public function edit($id): void
    {
        $categories = Category::query()->find($id);
        echo $this->view()->make('categories.edit', [
            'category' =>  $categories
        ])->render();
    }
    public function update($id): void
    {
        Category::query()->find($id)->update(input()->all());
        redirect('/categories');
    }


    public function delete($id): void
    {
        Category:Category::query()->find((int)$id)->delete();
        redirect('/categories');
    }

}