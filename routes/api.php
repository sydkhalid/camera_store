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
Route::group([ 'prefix' => 'auth'], function (){
    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'API\AuthController@login');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('getCategories', 'API\CategoryController@getCategories');
        Route::get('getProducts', 'API\CategoryController@getProducts');
        Route::get('getProducts/{category_id}', 'API\CategoryController@getProduct');
        Route::post('AddtoCart', 'API\CategoryController@addtoCart');
        Route::get('getCart', 'API\CategoryController@getCart');
        Route::get('logout', 'API\AuthController@logout');
    });
});
