<?php

namespace App\Http\Requests;

interface FormRequest
{
    public function validated(array $data): array;
}