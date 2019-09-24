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

Route::prefix('/categories')->group(function () {
    Route::get('/', ['uses' => 'CategoryController@index']);

    Route::get('/{id}', ['uses' => 'CategoryController@show'])->where(['id' => '[0-9]+']);
    Route::post('/', ['uses' => 'CategoryController@create']);
    Route::put('/{id}', ['uses' => 'CategoryController@update'])->where(['id' => '[0-9]+']);
    Route::delete('/{id}', ['uses' => 'CategoryController@delete'])->where(['id' => '[0-9]+']);
});

Route::prefix('/products')->group(function () {

});


Route::prefix('/users')->group(function () {

});