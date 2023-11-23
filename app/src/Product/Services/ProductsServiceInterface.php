<?php

namespace App\Src\Product\Services;

use App\Src\Product\Dto\ProductDto;

interface ProductsServiceInterface
{
    public function create(ProductDto $product): void;
    public function update(int $id, ProductDto $data): void;
    public function delete(int $id): void;
}
