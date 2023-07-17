<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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