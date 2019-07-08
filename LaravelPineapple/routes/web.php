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
Route::get('/', function () {
    return view('welcome');
});

Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('','HomeController@getIndex');

Route::prefix('pineapple')->group(function () {
	Route::get('master-{body}', 'UserController@getHome');
	Route::post('control-amount', 'UserController@postControlAmount');
	Route::get('search', 'SearchController@getSearch');
	Route::get('shopping-cart', 'CartController@getShoppingCart');
	Route::get('qty-cart', 'CartController@getQtyCart');
	Route::post('add-cart-{book_id}', 'CartController@postAddCart');
	Route::post('pay-cart-{book_id}', 'CartController@postPayCart');
	Route::post('remove-cart-{book_id}', 'CartController@postRemoveCart');
	Route::post('remove-all', 'CartController@postRemoveAll');
	Route::post('cart-check', 'CartController@postCartCheck');
	Route::post('checkout', 'CartController@postCheckout');
	
	
});
Route::prefix('admin')->group(function () {
	Route::get('login', 'AdminController@getLogin');
	Route::post('check', 'AdminController@postCheck');
	
	Route::post('product-view', 'AdminProductController@postView');
	Route::post('product-control', 'AdminProductController@postControl');
	Route::post('product-add', 'AdminProductController@postAdd');
	Route::post('product-update-{book_id}', 'AdminProductController@postUpdate');
	Route::post('product-edit-{book_id}', 'AdminProductController@postEditUpdate');
	Route::post('product-delete-{book_id}', 'AdminProductController@postDelete');
	
	Route::post('type-view', 'AdminTypeController@postView');
	Route::post('type-control', 'AdminTypeController@postControl');
	Route::post('type-add', 'AdminTypeController@postAdd');
	Route::post('type-update-{type_id}', 'AdminTypeController@postUpdate');
	Route::post('type-edit-{type_id}', 'AdminTypeController@postEditUpdate');
	Route::post('type-delete-{type_id}', 'AdminTypeController@postDelete');
	
	Route::post('discount-view', 'AdminDiscountController@postView');
	Route::post('discount-control', 'AdminDiscountController@postControl');
	Route::post('discount-add', 'AdminDiscountController@postAdd');
	Route::post('discount-update-{discount_id}', 'AdminDiscountController@postUpdate');
	Route::post('discount-edit-{discount_id}', 'AdminDiscountController@postEditUpdate');
	Route::post('discount-delete-{discount_id}', 'AdminDiscountController@postDelete');
	
	Route::post('order-view', 'AdminOrderController@postView');
	Route::post('order-control', 'AdminOrderController@postControl');
	Route::post('order-delivery-{order_id}', 'AdminOrderController@postDelivery');
});


