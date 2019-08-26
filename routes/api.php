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
Route::post('/loginFacebook','AuthController@loginWithFacebook');
Route::post('/login', 'AuthController@login');
Route::post('/signup', 'UserController@create');
Route::group(['middleware' => 'jwt.verify'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::get('/users/{id}', 'UserController@findById')->name('User.findById');
    Route::post('/users/{postId}', 'UserController@update')->name('User.update');
});

