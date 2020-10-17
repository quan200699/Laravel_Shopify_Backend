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
Route::group(['prefix' => 'warehouses'], function () {
    Route::get('/', 'WarehouseController@index')->name('warehouse.all');
    Route::get('/{id}', 'WarehouseController@show')->name('warehouse.show');
    Route::post('/', 'WarehouseController@store')->name('warehouse.store');
    Route::put('/{id}', 'WarehouseController@update')->name('warehouse.update');
    Route::delete('/{id}', 'WarehouseController@destroy')->name('warehouse.destroy');
});
Route::group(['prefix' => 'warehouse_bills'], function () {
    Route::get('/', 'WarehouseBillController@index')->name('warehouseBill.all');
    Route::get('/{id}', 'WarehouseBillController@show')->name('warehouseBill.show');
    Route::post('/', 'WarehouseBillController@store')->name('warehouseBill.store');
    Route::put('/{id}', 'WarehouseBillController@update')->name('warehouseBill.update');
    Route::delete('/{id}', 'WarehouseBillController@destroy')->name('warehouseBill.destroy');
});
