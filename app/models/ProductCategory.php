<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
