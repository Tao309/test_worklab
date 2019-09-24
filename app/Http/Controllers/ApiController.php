<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::guest())
        {
            return $this->sendError('Not Authorized', 404);
        }

        $data = $request->input();

        $result = $this->model->create($data);

        return $this->sendReponse($result, self::RESPONSE_OK, 201);
    }
    public function update(Request $request, int $id)
    {
        if(Auth::guest())
        {
            return $this->sendError('Not Authorized', 404);
        }

        $entity = $this->model->find($id);

        if(empty($entity))
        {
            return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
        }

        $data = $request->input();
        $entity->fill($data)->push();

//        $data = $request->all();
//        $result = $entity->update($data);

        return $this->sendReponse(null, self::RESPONSE_UPDATED, 200);//204
    }
    public function delete(int $id)
    {
        if(Auth::guest())
        {
            return $this->sendError('Not Authorized', 404);
        }

        $entity = $this->model->find($id);

        if(empty($entity))
        {
            return $this->sendError(self::RESPONSE_NOT_FOUND, 404);
        }

        $entity->delete();

        return $this->sendReponse(null, self::RESPONSE_DELETED, 204);
    }
}
