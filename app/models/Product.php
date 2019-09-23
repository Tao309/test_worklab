<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id');
    }
}
