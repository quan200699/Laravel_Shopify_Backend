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
