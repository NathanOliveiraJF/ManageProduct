<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'category_id',
        'sku',
        'name',
        'price',
        'description',
        'quantity'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}