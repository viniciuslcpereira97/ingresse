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

/*
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
*/

Route::prefix('users')->namespace('Api')->group(function() {

    // GET
    Route::get('/', 'UsersController@all');
    Route::get('/{id}', 'UsersController@getById');

    // POST
    Route::post('/{id}', 'UsersController@store');

    // PUT
    Route::put('/{id}', 'UsersController@udpateById');

    // DELETE
    Route::delete('/{id}', 'UsersController@deleteById');

});
