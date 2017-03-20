<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@home');

Route::auth();

Route::resource('products', 'ProductsController');

Route::resource('in_shopping_carts', 'InShoppingCartsController', [
  'only'  => ['store', 'destroy'] 
]);

Route::get('/cart', 'ShoppingCartsController@index');

Route::get('/payments/store', 'PaymentsController@store');

Route::resource('purchases', 'ShoppingCartsController', [
  'only'  => ['show']
]);

Route::resource('orders', 'OrdersController', [
  'only'  => ['index', 'update']
]);