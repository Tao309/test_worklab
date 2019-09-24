<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends \App\Http\Controllers\ApiController
{
    public function __construct(\App\models\ProductCategory $model)
    {
        $this->model = $model;
    }
}
