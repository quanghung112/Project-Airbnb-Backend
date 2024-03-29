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
    Route::post('/searchtime','OrderController@searchTime');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/changePassword', 'AuthController@changePassword')->name('User.changePassword');
    Route::get('/users/{id}', 'UserController@findById')->name('User.findById');
    Route::post('/me/update', 'UserController@update')->name('User.update');
    Route::get('/me', 'AuthController@getUser')->name('User.update');
    Route::group(['prefix'=>'houses'], function (){
        Route::get('/newHouse/{userId}','HouseController@getNewHouse');
        Route::get('/getHousesOfUser/{userId}','HouseController@getHouseOfUser');
        Route::post('/create', 'HouseController@create')->name('House.create');
        Route::post('/saveImage', 'HouseController@saveImage');
        Route::delete('/deleteImage/{imageId}', 'HouseController@deleteImage');
        Route::post('/updatePost/{houseId}', 'HouseController@updatePost');
        Route::delete('/deletePost/{houseId}', 'HouseController@deletePost');
        Route::get('/revenue/{houseId}', 'HouseController@updateRevenue');
        Route::get('/revenue-cancel/{houseId}', 'HouseController@updateCancelRevenue');
        Route::post('{houseId}/create_comment', 'CommentController@store');

    });
    Route::group(['prefix'=>'comments'], function (){
        Route::post('{idComment}/update_comment', 'CommentController@update');
        Route::delete('{idComment}/delete_comment', 'CommentController@delete');
    });
    Route::post('order','UserController@orderHouse');
    Route::get('getUserOrder/{houseId}', 'OrderController@getUserOrderHouse');
    Route::get('getHouseOrder/{userId}', 'OrderController@getHouseOrderOfUser');
    Route::post('updateOrder/{idOrder}', 'OrderController@updateOrder');
});
Route::group(['prefix'=>'houses'],function(){
    Route::get('/', 'HouseController@getAll')->name('House.getAll');
    Route::get('/{id}', 'HouseController@findById')->name('House.findById');
    Route::get('/getImageHouse/{houseId}', 'HouseController@getImages');
    Route::post('/search', 'HouseController@searchHouse');
});

Route::get('houses/{houseId}/comments', 'HouseController@getComment');
//Route::get('comments/{idComment}/get_user_comment', 'CommentController@getUserComment');
Route::post('comments/{idComment}/update_time_comment', 'CommentController@updateTimeComment');
Route::get('houses/{idHouse}/get_user_comment', 'HouseController@getUsersComment');
Route::group(['prefix'=>'location'],function (){
    Route::get('cities','Location@getCity');
    Route::get('cities/{matp}','Location@getDistrict');
    Route::get('districts/{maqh}','Location@getSubDistrict');
    Route::get('city/{matp}','Location@findCityId');
    Route::get('district/{maqh}','Location@findDistrictId');
    Route::get('subdistrict/{xaid}','Location@findSubDistrictId');
});

