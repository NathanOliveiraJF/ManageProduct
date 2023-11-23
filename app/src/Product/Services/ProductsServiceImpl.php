<?php

namespace App\Src\Product\Services;

use App\Exceptions\ProductException;
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

  public function create(array $product): void
  {
    try {
      $this->createProductRequest->validated($product);
      $alreadyExists = Product::getProductBySku($product['sku']);
      if ($alreadyExists) {
        throw ProductException::ProductSkuAlreadExist();
      }
      $product = Product::query()->create($product);
      $product->categories()->attach(input('categories'));
    } catch (NestedValidationException $e) {
      throw ProductException::ProductPayloadIsInvalid($e->getFullMessage());
    }
  }

  public function update(int $id, array $data): void
  {
    try {
      $this->createProductRequest->validated($data);
      $product = Product::query()->find($id);
      $productExist = Product::getProductBySku($data['sku']);
      if ($productExist->sku != $product->sku) {
        throw ProductException::ProductSkuAlreadExist();
      }
      $product->update($data);
      $product->categories()->detach();
      $product->categories()->attach(input('categories'));
    } catch (NestedValidationException $e) {
      throw ProductException::ProductPayloadIsInvalid($e->getFullMessage());
    }
  }

  public function delete(int $id): void
  {
    Product::query()->find($id)->delete();
  }
}
