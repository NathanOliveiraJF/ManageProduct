<?php

namespace App\Exceptions;

class ProductException extends \Exception
{
    public static function ProductSkuAlreadExist(): self
    {
        return new self("This sku already Exist");
    }

    public static function ProductPayloadIsInvalid(string $message): self
    {
        return new self($message);
    }
}
