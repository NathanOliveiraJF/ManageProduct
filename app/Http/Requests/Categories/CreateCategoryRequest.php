<?php

namespace App\Http\Requests\Categories;
use App\Models\Category;
use Exception;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;
class CreateCategoryRequest
{
    /**
     * @throws Exception
     */
    public static function validated($input): void
    {
        //TODO: feed the exception as it catches errors and returns
        $validator = v::key('code', v::number())->key('name', v::stringType()->notEmpty());
        $validator = $validator->validate($input);
        if(!$validator) {
            throw new Exception('Invalid Data');
        }
    }
}