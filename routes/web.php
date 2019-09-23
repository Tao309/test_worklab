<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group([
    'namespace' => 'Shop',
    //'prefix' => 'shop',
], function () {
    Route::resource('categories', 'ProductCategoryController')->names('shop.categories');
    Route::resource('products', 'ProductController')->names('shop.products');
});

