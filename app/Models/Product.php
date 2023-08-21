<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\DB;

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

    public static function getProductBySku(string $sku): object|null
    {
        return Product::query()->where('sku', '=', $sku)->first();
    }

}