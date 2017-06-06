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

Route::get('/', ['as' => 'home', 'uses' => '\App\Http\Controllers\HomeController@index']);
Route::get('/test', ['as' => 'test', 'uses' => '\App\Http\Controllers\TestController@index']);
Route::get('/c/{collection}', ['as' => 'collection', 'uses' => '\App\Http\Controllers\CollectionController@index']);

Route::get('/logout', ['as' => 'auth.logout', 'uses' => '\App\Http\Controllers\Auth\LogoutController@index']);
Route::get('/login', ['as' => 'login', 'uses' => '\App\Http\Controllers\Auth\LoginController@get']);
Route::post('/login', ['as' => 'auth.login', 'uses' => '\App\Http\Controllers\Auth\LoginController@post']);
Route::post('/register', ['as' => 'auth.register', 'uses' => '\App\Http\Controllers\Auth\RegisterController@create']);


Route::get('/social/redirect/google',   ['as' => 'auth.google.redirect',   'uses' => 'Auth\GoogleController@redirect']);
Route::get('/social/handle/google',   ['as' => 'auth.google.handle',   'uses' => 'Auth\GoogleController@handle']);

Route::get('/social/redirect/facebook',   ['as' => 'auth.facebook.redirect',   'uses' => 'Auth\FacebookController@redirect']);
Route::get('/social/handle/facebook',   ['as' => 'auth.facebook.handle',   'uses' => 'Auth\FacebookController@handle']);


Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', ['as' => 'product.index', 'uses' => '\App\Http\Controllers\Api\ProductController@index']);
    });
    Route::group(['prefix' => 'wishlist'], function () {
        Route::get('/', ['as' => 'wishlist.index', 'uses' => '\App\Http\Controllers\Api\WishlistController@index']);
        Route::post('/{wishlist}', ['as' => 'wishlist.update', 'uses' => '\App\Http\Controllers\Api\WishlistController@update']);
        Route::get('/{wishlist}', ['as' => 'wishlist.show', 'uses' => '\App\Http\Controllers\Api\WishlistController@show']);
        Route::post('/', ['as' => 'wishlist.store', 'uses' => '\App\Http\Controllers\Api\WishlistController@store']);

    });

});