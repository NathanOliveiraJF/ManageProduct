<?php

namespace App\Services;

interface ServiceInterface
{
    public function create(array $product): void;
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
}
