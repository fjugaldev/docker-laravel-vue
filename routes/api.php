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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\UserController@login');
Route::post('register', 'Auth\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    // ORDERS
    Route::prefix('/orders')->group(function () {
        Route::post('/', 'Api\OrderController@store');
    });


    // DRIVERS
    Route::prefix('/drivers')->group(function () {
        Route::get('/{driver}', 'Api\DriverController@orders');
        Route::get('/{driver}/order/{order}', 'Api\DriverController@order');
        Route::get('/{driver}/{date?}', 'Api\DriverController@ordersByDate');
    });

});


