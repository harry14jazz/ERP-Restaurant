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
Route::post('register', 'User\UserController@register');
Route::post('login', 'User\UserController@login');

$router->group(['prefix' => 'v1', 'middleware' => ['jwt.verify']], function() use ($router){
    $router->group(['prefix' => '/order'], function() use ($router){
        Route::post('post-order', 'Order\OrderController@store');
        Route::get('get-order', 'Order\OrderController@index');
        Route::post('update-order/{param}', 'Order\OrderController@update');
        Route::delete('delete-order/{param}', 'Order\OrderController@delete');
        Route::get('payment', ['middleware' => 'kasir', 'uses' => 'Order\OrderController@payment']);
        Route::get('recap', ['middleware' => 'pelayan', 'uses' => 'Order\OrderController@recap']);
    });

    $router->group(['prefix' => '/menu'], function() use ($router){
        Route::post('post-menu', 'Menu\MenuController@store');
        Route::get('get-menu', 'Menu\MenuController@index');
        Route::post('update-menu/{param}', 'Menu\MenuController@update');
        Route::delete('delete-menu/{param}', 'Menu\MenuController@delete');
    });
    
});