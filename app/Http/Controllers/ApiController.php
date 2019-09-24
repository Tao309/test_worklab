<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ApiController extends Controller
{
    use \App\Traits\ApiReponse;

    CONST RESPONSE_OK = 'OK';
    CONST RESPONSE_UPDATED = 'Updated';
    CONST RESPONSE_DELETED = 'Deleted';
    CONST RESPONSE_NOT_FOUND = 'Not Found';

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function index(Request $request)
    {
        $limit = $request->get('limit', 50);

        $result = $this->model->limit($limit)->offset(0)->get();

        return $this->sendReponse($result, self::RESPONSE_OK, 200);

    }
    public function show(int $id)
    {
        $entity = $this->model->find($id);

        if(empty($entity))
        {
            return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
        }

        return $this->sendReponse($entity, self::RESPONSE_OK, 200);
    }
    public function create(Request $request)
    {
        $result = null;

        return $this->sendReponse($result, self::RESPONSE_OK, 201);
    }
    public function update(Request $request, int $id)
    {
        $entity = $this->model->find($id);

        if(empty($entity))
        {
            return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
        }

        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendReponse(null, self::RESPONSE_UPDATED, 204);
    }
    public function delete(int $id)
    {
        $entity = $this->model->find($id);

        if(!$entity)
        {
            return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
        }

        $entity->delete();

        return $this->sendReponse(null, self::RESPONSE_DELETED, 204);
    }
}
