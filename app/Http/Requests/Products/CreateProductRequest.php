<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\FormRequest;
use Respect\Validation\Validator as v;

class CreateProductRequest implements FormRequest
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