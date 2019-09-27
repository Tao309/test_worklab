<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'category_id'];

    public function category()
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'category_id', 'product_id');
    }
}
