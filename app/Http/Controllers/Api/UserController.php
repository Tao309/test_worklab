<?php
namespace App\Http\Controllers\Api;

class CategoryController extends \App\Http\Controllers\ApiController
{
    public function __construct(\App\User $model)
    {
        $this->model = $model;
    }

    public function delete(int $id)
    {
        return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
    }
}
