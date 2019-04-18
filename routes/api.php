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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// 

Route::group([
    'middleware' => 'api',
    'prefix' => 'Auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::post('register','AuthController@register' );
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
], function(){
    Route::get('{id}', 'GalleriesController@show');
    Route::post('/', 'GalleriesController@store');
    Route::put('{id}', 'GalleriesController@update');
    Route::delete('{id}', 'GalleriesController@destroy');
    Route::post('{id}/comments', 'CommentsController@store');
});

Route::delete('/comments/{id}' , 'CommentsController@destory');
