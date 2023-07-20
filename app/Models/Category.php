<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'code',
        'name'
    ];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}