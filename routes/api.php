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
    Route::get('/{customerId}', 'WarehouseController@show')->name('warehouse.show');
    Route::post('/', 'WarehouseController@store')->name('warehouse.store');
    Route::put('/{customerId}', 'WarehouseController@update')->name('warehouse.update');
    Route::delete('/{customerId}', 'WarehouseController@destroy')->name('warehouse.destroy');
});
Route::group(['prefix' => 'warehouse_bills'], function () {
    Route::get('/', 'WarehouseBillController@index')->name('warehouseBill.all');
    Route::get('/{customerId}', 'WarehouseBillController@show')->name('warehouseBill.show');
    Route::post('/', 'WarehouseBillController@store')->name('warehouseBill.store');
    Route::put('/{customerId}', 'WarehouseBillController@update')->name('warehouseBill.update');
    Route::delete('/{customerId}', 'WarehouseBillController@destroy')->name('warehouseBill.destroy');
});
