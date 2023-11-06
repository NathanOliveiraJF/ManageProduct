<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductException;
use App\Http\Requests\Products\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductsService;

class ProductsController extends Controller
{
    protected CreateProductRequest $request;
    protected ProductsService $productsService;

    public function __construct()
    {
        $this->request = new CreateProductRequest();
        $this->productsService = new ProductsService();
    }

    public function index(): void
    {
        echo $this->view()->make('products.index', [
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
        try {
            $this->productsService->create(input()->all());
            $_SESSION['message'] = 'Product Successfully Created';
            redirect('/products');
        } catch (ProductException $productException) {
            $_SESSION['message'] = $productException->getMessage();
            redirect('/products/create');
        }
    }

    public function edit($id): void
    {
        $product = Product::query()->find($id);
        $categories = Category::all();
        echo $this->view()->make('products.edit', [
            'product' => $product,
            'categories' => $categories
        ])->render();
    }

    public function update($id): void
    {
        try {
            $this->productsService->update($id, input()->all());
            $_SESSION['message'] = 'Product Successfully Updated';
            redirect('/products');
        } catch (ProductException $productException) {
            $_SESSION['message'] = $productException->getMessage();
            redirect("/products/edit/$id");
        }
    }

    public function delete($id): void
    {
        Product::query()->find($id)->delete();
        $_SESSION['message'] = 'Product Successfully Deleted';
        redirect('/products');
    }
}
