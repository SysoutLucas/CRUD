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

Route::get('/', 'UserController@showLogin')->name('login');
Route::post('/autenticar', 'UserController@autenticar');
Route::get('/cadastrar', 'UserController@showRegister');
Route::get('/logout', 'UserController@logout');


Route::group([
    'middleware' => 'auth.verify'
], function ($router) {
    Route::get('home', 'UserController@home');
    Route::get('user/add', 'UserController@showAdd');
    Route::post('user/add', 'UserController@register');
    Route::get('user/edit/{id}', 'UserController@showEdit')->where(['id' => '[0-9]+']);
    Route::post('user/edit/{id}', 'UserController@store')->where(['id' => '[0-9]+']);
    Route::delete('user/delete/{id}', 'UserController@destroy')->where(['id' => '[0-9]+']);
    Route::get('user/list', 'UserController@showList');
});

