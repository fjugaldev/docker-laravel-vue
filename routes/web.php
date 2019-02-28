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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::prefix('/admin')->group(function () {
    Route::get('/login', 'Auth\UserController@loginForm')->name('login');
    Route::get('/dashboard', 'Web\AdminController@index')->name('dashboard');

    Route::group(['middleware' => 'auth:api'], function(){
        //Route::get('/orders', 'Web\OrderController@orders')->name('orders');
        //Route::get('/drivers', 'Web\UserController@drivers')->name('drivers');
        //Route::get('/customers', 'Web\UserController@customers')->name('customers');
    });
});



