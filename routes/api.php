<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'categories',
], function () {
    Route::get('/', ['uses' => 'CategoryController@index']);

    Route::get('/{id}', ['uses' => 'CategoryController@show'])->where(['id' => '[0-9]+']);
    Route::get('/{id}/products', ['uses' => 'CategoryController@showProducts'])->where(['id' => '[0-9]+']);
});


Route::group([
    'namespace' => 'Api',
    'prefix' => 'products',
], function () {
    Route::get('/', ['uses' => 'ProductController@index']);

    Route::get('/{id}', ['uses' => 'ProductController@show'])->where(['id' => '[0-9]+']);
});


Route::group([
    'namespace' => 'Api',
    'prefix' => 'users',
], function () {
    Route::get('/', ['uses' => 'UserController@index']);

    Route::get('/{id}', ['uses' => 'UserController@show'])->where(['id' => '[0-9]+']);
    Route::post('/', ['uses' => 'UserController@create']);
    Route::put('/{id}', ['uses' => 'UserController@update'])->where(['id' => '[0-9]+']);
    Route::delete('/{id}', ['uses' => 'UserController@delete'])->where(['id' => '[0-9]+']);
});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'auth',
], function () {
    Route::post('/register', ['uses' => 'AuthController@register']);
    Route::post('/login', ['uses' => 'AuthController@login']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/userDetail', ['uses' => 'Api\AuthController@detail']);

    Route::post('/', ['uses' => 'Api\CategoryController@create']);
    Route::put('/{id}', ['uses' => 'Api\CategoryController@update'])->where(['id' => '[0-9]+']);
    Route::delete('/{id}', ['uses' => 'Api\CategoryController@delete'])->where(['id' => '[0-9]+']);

    Route::post('/', ['uses' => 'Api\ProductController@create']);
    Route::put('/{id}', ['uses' => 'Api\ProductController@update'])->where(['id' => '[0-9]+']);
    Route::delete('/{id}', ['uses' => 'Api\ProductController@delete'])->where(['id' => '[0-9]+']);
});