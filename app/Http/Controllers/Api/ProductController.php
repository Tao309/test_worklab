<?php
namespace App\Http\Controllers\Api;

class CategoryController extends \App\Http\Controllers\ApiController
{
    public function __construct(\App\models\Product $model)
    {
        $this->model = $model;
    }
}
