<?php
namespace App\Http\Controllers\Api;

use App\models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends \App\Http\Controllers\ApiController
{
    public function __construct(\App\models\ProductCategory $model)
    {
        $this->model = $model;
    }

    public function showProducts(int $id)
    {
        $entity = $this->model->find($id);

        if(empty($entity))
        {
            return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
        }

        $products = Product::where('category_id', $id)->get();

        return $this->sendReponse($products, self::RESPONSE_OK, 200);
    }
}
