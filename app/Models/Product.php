<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        "name",
        "price",
        "stock",
        "image",
        "category_id"
    ];

    public function products() : BelongsTo {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function category() : BelongsTo {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
}
