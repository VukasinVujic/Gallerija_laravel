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

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

Route::group([
    // 'middleware' => 'api',
    // 'prefix' => 'Auth'
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register','AuthController@register' );
    Route::get('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
}); 
Route::group([
    'prefix'=> 'all-galleries'   
], function() {
    Route::get('/', 'GalleriesController@index');
    Route::get('{id}', 'UserGalleriesController@index');
});
Route::group([
    'prefix' => 'galleries'
], function($router){
    Route::get('{id}', 'GalleriesController@show');
    Route::post('/', 'GalleriesController@store');
    Route::put('{id}', 'GalleriesController@update');
    Route::delete('{id}', 'GalleriesController@destroy');
    Route::post('{id}/comments', 'CommentsController@store');
});
Route::delete('/comments/{id}' , 'CommentsController@destory');
