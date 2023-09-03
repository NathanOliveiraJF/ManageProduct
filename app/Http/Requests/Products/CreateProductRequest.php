<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\FormRequest;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class CreateProductRequest implements FormRequest
{
    protected bool $isValid;
    protected String $message;

    public function validated(array $data): array
    {
        $validated = [];
        $validator = v::key('sku', v::stringType()->notEmpty())
            ->key('name', v::stringType()->notEmpty())
            ->key('price', v::number()->notEmpty())
            ->key('description', v::stringType()->notEmpty())
            ->key('quantity', v::number()->notEmpty());
        try {
            $validator->assert($data);
            $this->isValid = true;
            $validated = [
                'sku' =>  $data['sku'],
                'name' =>  $data['name'],
                'price' => (float)$data['price'],
                'description' =>   $data['description'],
                'quantity' => (int)$data['quantity']
            ];
        } catch (NestedValidationException $exception) {
           $this->message = $exception->getFullMessage();
           $this->isValid = false;
        }
        return $validated;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }
}
