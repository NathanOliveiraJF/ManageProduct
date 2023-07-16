<?php

namespace App\Models;

class Product
{
    protected int $id;
    protected int $category_id;
    protected string $sku;
    protected string $name;
    protected float $price;
    protected string $description;
    protected float $quantity;
}