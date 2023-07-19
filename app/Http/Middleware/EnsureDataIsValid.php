<?php

namespace App\Http\Middleware;

use App\Http\Requests\Categories\CreateCategoryRequest;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class EnsureDataIsValid implements  IMiddleware
{
    public function handle(Request $request): void
    {
        //TODO: ok -> continue, not ok - return page
        try {
            CreateCategoryRequest::validated(input()->all());
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}