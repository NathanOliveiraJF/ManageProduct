<?php

namespace App\Src\Product\Dto;

class ProductDto
{
    private function __construct(
        public readonly string $sku,
        public readonly string $name,
        public readonly string $price,
        public readonly string $description,
        public readonly int $quantity,
    ) {
    }
    public static function create(array $data): ProductDto
    {
        return new self($data["sku"], $data["name"], $data["price"], $data["description"], $data["quantity"]);
    }
}