<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductException;
use App\Models\Category;
use App\Models\Product;
use App\Services\ServiceInterface;
use Config\DI\Builder;
use Jenssegers\Blade\Blade;

class ProductsController
{
  protected ServiceInterface $productsService;
  protected Blade $view;

  public function __construct()
  {
    $this->productsService = Builder::getContainer("ProductsService");
    $this->view = Builder::getContainer("Blade");
  }

  public function index(): void
  {
      echo $this->view->make('products.index', [
          'products' => Product::all()
      ])->render();
  }

  public function create(): void
  {
      echo $this->view->make('products.create', [
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
      echo $this->view->make('products.edit', [
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
      $this->productsService->delete($id);
      $_SESSION['message'] = 'Product Successfully Deleted';
      redirect('/products');
  }
}
