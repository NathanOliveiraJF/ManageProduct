<?php

namespace App\Src\Dashboard\Http\Controllers;


use App\Src\Product\Entity\Product;
use Config\DI\Builder;
use Jenssegers\Blade\Blade;

class DashboardController
{
  protected Blade $view;

  public function __construct()
  {
    $this->view = Builder::getContainer("Blade");
  }
  public function index(): void
  {
    $quantityProduct = Product::query()->count();
    $products = Product::all();
    echo $this->view->make('dashboard.index', [
      'quantityProduct' => $quantityProduct,
      'products' => $products
    ])->render();
  }
}
