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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('category.all');
    Route::get('/{id}', 'CategoryController@show')->name('category.show');
    Route::post('/', 'CategoryController@store')->name('category.store');
    Route::put('/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/{id}', 'CategoryController@destroy')->name('category.destroy');
});
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('product.all');
    Route::get('/{id}', 'ProductController@show')->name('product.show');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::put('/{id}', 'ProductController@update')->name('product.update');
    Route::delete('/{id}', 'ProductController@destroy')->name('product.destroy');
});
Route::group(['prefix' => 'images'], function () {
    Route::get('/', 'ImageController@index')->name('image.all');
    Route::get('/{id}', 'ImageController@show')->name('image.show');
    Route::post('/', 'ImageController@store')->name('image.store');
    Route::put('/{id}', 'ImageController@update')->name('image.update');
    Route::delete('/{id}', 'ImageController@destroy')->name('image.destroy');
});
Route::group(['prefix' => 'reviews'], function () {
    Route::get('/', 'ReviewController@index')->name('review.all');
    Route::get('/{id}', 'ReviewController@show')->name('review.show');
    Route::post('/', 'ReviewController@store')->name('review.store');
    Route::put('/{id}', 'ReviewController@update')->name('review.update');
    Route::delete('/{id}', 'ReviewController@destroy')->name('review.destroy');
});
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'OrderController@index')->name('order.all');
    Route::get('/{id}', 'OrderController@show')->name('order.show');
    Route::post('/', 'OrderController@store')->name('order.store');
    Route::put('/{id}', 'OrderController@update')->name('order.update');
    Route::delete('/{id}', 'OrderController@destroy')->name('order.destroy');
});
