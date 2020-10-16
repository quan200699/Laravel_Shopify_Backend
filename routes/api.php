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
    Route::get('/{customerId}', 'CategoryController@show')->name('category.show');
    Route::post('/', 'CategoryController@store')->name('category.store');
    Route::put('/{customerId}', 'CategoryController@update')->name('category.update');
    Route::delete('/{customerId}', 'CategoryController@destroy')->name('category.destroy');
});
