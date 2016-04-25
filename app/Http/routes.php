<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    Route::group(['prefix'=>'order'], function(){
        Route::get('/', ['as' => 'listOrder', 'uses' => 'OrderController@index']);
        Route::get('/add', ['as' => 'viewAddOrder', 'uses' => 'OrderController@viewAdd']);
        Route::get('/{order}/edit', ['as' => 'viewEdit', 'uses' => 'OrderController@viewEdit']);
        Route::patch('{order}', ['as' => 'update', 'uses' => 'OrderController@update']);
        Route::get('/giaoTrongNgay', ['as' => 'viewGiaoTrongNgay', 'uses' => 'OrderController@viewGiaoTrongNgay']);
        Route::post('/add', ['as' => 'postOrder', 'uses' => 'OrderController@ThemDonHang']);
        Route::get('/getOrderListData', ['as' => 'getOrderListData', 'uses' => 'OrderController@getOrderListData']);
        Route::get('/getGiaoTrongNgayData', ['as' => 'getGiaoTrongNgayData', 'uses' => 'OrderController@getGiaoTrongNgayData']);
    });
});
Route::auth();

Route::get('/home', 'HomeController@index');
