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

Route::group(['middleware' => ['XSS']], function () {
    Route::get('/order/insert', 'OrderController@insert');
    Route::get('/order/loworders', 'OrderController@listLowOrders');
    Route::get('/order/lastorders', 'OrderController@listLastOrders');
    Route::get('/order/highorders', 'OrderController@listHighOrders');
});



