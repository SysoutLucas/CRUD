<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group([
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'auth'

], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});

Route::group([
    'middleware' => 'jwt.verify'
],function($router) {
    Route::get('users','UserController@list');
    Route::post('users/update/{id}','UserController@store')->where(['id' => '[0-9]+']);
    Route::get('users/show/{id}','UserController@show')->where(['id' => '[0-9]+']);
    Route::delete('users/delete/{id}','UserController@destroy')->where(['id' => '[0-9]+']);
});
