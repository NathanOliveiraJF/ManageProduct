<?php

namespace App\Src\Product\Http\Requests;

use App\Src\Product\Http\Requests\ProductFormRequestInterface;
use Respect\Validation\Validator as v;

class CreateProductRequestImpl implements ProductFormRequestInterface
{
    public function validated(array $data): void
    {
        $validator = v::key('sku', v::stringType()->notEmpty())
            ->key('name', v::stringType()->notEmpty())
            ->key('price', v::number()->notEmpty())
            ->key('description', v::stringType()->notEmpty())
            ->key('quantity', v::number()->notEmpty());
        $validator->assert($data);
    }
}