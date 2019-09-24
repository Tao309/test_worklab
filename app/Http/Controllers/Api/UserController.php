<?php
namespace App\Http\Controllers\Api;

class CategoryController extends \App\Http\Controllers\ApiController
{
    public function __construct(\App\User $model)
    {
        $this->model = $model;
    }
}
