<?php

namespace App\Src\Product\Entity;

use App\Src\Category\Entity\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'sku',
        'name',
        'price',
        'description',
        'quantity'
    ];
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}