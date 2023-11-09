<?php

namespace App\Services;

use App\Exceptions\ProductException;
use App\Http\Requests\FormRequest;
use App\Models\Product;
use Config\DI\Builder;
use Respect\Validation\Exceptions\NestedValidationException;

class ProductsService implements ServiceInterface
{
  private FormRequest $createProductRequest;

  public function __construct()
  {
    $this->createProductRequest = Builder::getContainer("CreateProductRequest");
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
