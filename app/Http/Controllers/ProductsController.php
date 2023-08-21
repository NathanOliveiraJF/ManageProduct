<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    protected CreateProductRequest $request;
    public function __construct()
    {
        $this->request = new CreateProductRequest();
    }
    public function  index(): void
    {
        echo $this->view()->make('products.index',[
            'products' => Product::all()
        ])->render();
    }

    public function create(): void
    {
        echo $this->view()->make('products.create', [
            'categories' => Category::all()
        ])->render();
    }

    public function store(): void
    {
        $productValidated = $this->request->validated(input()->all());
        if(!$this->request->isValid())  {
            $_SESSION['message'] = $this->request->getMessage();
            redirect('/products/create');
        }
        $alreadyExists = Product::getProductBySku($productValidated['sku']);
        if ($alreadyExists) {
            $_SESSION['message'] = 'This sku already Exist';
            redirect('/products');
        }
        $product = Product::query()->create($productValidated);
        $product->categories()->attach(input('categories'));
        $_SESSION['message'] = 'Product Successfully Created';
        redirect('/products');
    }

    public function edit($id): void
    {
        $product = Product::query()->find($id);
        $categories = Category::all();
        echo $this->view()->make('products.edit', [
            'product' =>  $product,
            'categories' => $categories
        ])->render();
    }

    public function update($id): void
    {
        $productValidated = $this->request->validated(input()->all());
        if(!$this->request->isValid())  {
            $_SESSION['message'] = $this->request->getMessage();
            redirect("/products/edit/$id");
        }
        $alreadyExists = Product::getProductBySku($productValidated['sku']);
        $product = Product::query()->find($id);
        if ($alreadyExists) {
            if ($alreadyExists->sku != $product->sku) {
                $_SESSION['message'] = "This sku $product->sku already Exist";
                redirect("/products/edit/$id");
            }
        }
        $product->update($productValidated);
        $product->categories()->detach();
        $product->categories()->attach(input('categories'));
        $_SESSION['message'] = 'Product Successfully Updated';
        redirect('/products');
    }

    public function delete($id): void
    {
        Product::query()->find($id)->delete();
        $_SESSION['message'] = 'Product Successfully Deleted';
        redirect('/products');
    }
}