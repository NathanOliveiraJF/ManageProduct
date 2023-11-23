<?php

namespace App\Src\Product\Services;

use App\Src\Product\Dto\ProductDto;
use App\Src\Product\Exceptions\ProductException;
use App\Src\Product\Entity\Product;
use App\Src\Product\Http\Requests\ProductFormRequestInterface;
use Config\DI\Builder;
use Respect\Validation\Exceptions\NestedValidationException;

class ProductsServiceImpl implements ProductsServiceInterface
{
  private ProductFormRequestInterface $createProductRequest;

  public function __construct()
  {
    $this->createProductRequest = Builder::getContainer("CreateProductRequestImpl");
  }

  public function create(ProductDto $product): void
  {
    try {
      $this->createProductRequest->validated((array) $product);
      $this->checkSkuAlreadyExist($product->sku);
      $product = Product::query()->create((array) $product);
      $product->categories()->attach(input('categories'));
    } catch (NestedValidationException $e) {
      throw ProductException::ProductPayloadIsInvalid($e->getFullMessage());
    }
  }

  public function update(int $id, ProductDto $product): void
  {
    try {
      $this->createProductRequest->validated((array) $product);
      $this->checkSkuAlreadyExist($product->sku);
      $productUpdated = Product::query()->find($id);
      $productUpdated->update((array) $product);
      $productUpdated->categories()->detach();
      $productUpdated->categories()->attach(input('categories'));
    } catch (NestedValidationException $e) {
      throw ProductException::ProductPayloadIsInvalid($e->getFullMessage());
    }
  }

  private function checkSkuAlreadyExist(string $sku): void
  {
    $productExist = Product::query()->where('sku', '=', $sku)->first();
    if ($productExist->sku != $sku) {
      throw ProductException::ProductSkuAlreadExist();
    }
  }
  public function delete(int $id): void
  {
    Product::query()->find($id)->delete();
  }
}
