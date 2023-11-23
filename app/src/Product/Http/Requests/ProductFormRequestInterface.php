<?php

namespace App\Src\Product\Http\Requests;

interface ProductFormRequestInterface
{
    public function validated(array $data): void;
}