<?php

namespace App\Src\Product\Services;

interface ProductsServiceInterface
{
    public function create(array $product): void;
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
}
