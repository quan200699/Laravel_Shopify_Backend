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
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('category.all');
        Route::get('/{id}', 'CategoryController@show')->name('category.show');
        Route::get('/{id}/products', 'CategoryController@findAllProductByCategory')->name('category.findAllProductByCategory');
        Route::post('/', 'CategoryController@store')->name('category.store');
        Route::put('/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/{id}', 'CategoryController@destroy')->name('category.destroy');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index')->name('product.all');
        Route::get('/sale-off', 'ProductController@getAllProductWithSaleOffGreaterThan')->name('product.getAllProductWithSaleOffGreaterThan');
        Route::get('/{id}', 'ProductController@show')->name('product.show');
        Route::get('/{id}/images', 'ProductController@getAllImage')->name('product.getAllImage');
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
    Route::group(['prefix' => 'warehouses'], function () {
        Route::get('/', 'WarehouseController@index')->name('warehouse.all');
        Route::get('/{id}', 'WarehouseController@show')->name('warehouse.show');
        Route::post('/', 'WarehouseController@store')->name('warehouse.store');
        Route::put('/{id}', 'WarehouseController@update')->name('warehouse.update');
        Route::delete('/{id}', 'WarehouseController@destroy')->name('warehouse.destroy');
    });
    Route::group(['prefix' => 'warehousebills'], function () {
        Route::get('/', 'WarehouseBillController@index')->name('warehouseBill.all');
        Route::get('/{id}', 'WarehouseBillController@show')->name('warehouseBill.show');
        Route::post('/', 'WarehouseBillController@store')->name('warehouseBill.store');
        Route::put('/{id}', 'WarehouseBillController@update')->name('warehouseBill.update');
        Route::delete('/{id}', 'WarehouseBillController@destroy')->name('warehouseBill.destroy');
    });
    Route::group(['prefix' => 'customer-infos'], function () {
        Route::get('/', 'CustomerInfoController@index')->name('customerInfo.all');
        Route::get('/{id}', 'CustomerInfoController@show')->name('customerInfo.show');
        Route::post('/', 'CustomerInfoController@store')->name('customerInfo.store');
        Route::put('/{id}', 'CustomerInfoController@update')->name('customerInfo.update');
        Route::delete('/{id}', 'CustomerInfoController@destroy')->name('customerInfo.destroy');
    });
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', 'NotificationController@index')->name('notification.all');
        Route::get('/{id}', 'NotificationController@show')->name('notification.show');
        Route::post('/', 'NotificationController@store')->name('notification.store');
        Route::put('/{id}', 'NotificationController@update')->name('notification.update');
        Route::delete('/{id}', 'NotificationController@destroy')->name('notification.destroy');
    });
    Route::group(['prefix' => 'carts'], function () {
        Route::get('/', 'ShoppingCartController@index')->name('carts.all');
        Route::get('/users/{id}', 'ShoppingCartController@findShoppingCartByUser')->name('carts.findShoppingCartByUser');
        Route::get('/{id}', 'ShoppingCartController@show')->name('carts.show');
        Route::post('/', 'ShoppingCartController@store')->name('carts.store');
        Route::put('/{id}', 'ShoppingCartController@update')->name('carts.update');
        Route::delete('/{id}', 'ShoppingCartController@destroy')->name('carts.destroy');
    });
    Route::group(['prefix' => 'items'], function () {
        Route::get('/', 'ItemController@index')->name('items.all');
        Route::get('/{id}', 'ItemController@show')->name('items.show');
        Route::post('/', 'ItemController@store')->name('items.store');
        Route::put('/{id}', 'ItemController@update')->name('items.update');
        Route::delete('/{id}', 'ItemController@destroy')->name('items.destroy');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/{id}/notifications', 'UserController@getAllNotificationByUser')->name('users.getAllNotificationByUser');
        Route::get('/{id}/notifications-desc', 'UserController@getAllNotificationByUserAndDateDesc')->name('users.getAllNotificationByUserAndDateDesc');
    });
});
