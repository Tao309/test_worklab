<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
