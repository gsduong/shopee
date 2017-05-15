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

Route::resource('user', 'UserController');
Route::resource('product', 'ProductController');

Route::get('/', 'ProductController@homeDisplay');
Route::get('/shop', 'ProductController@shopDisplay');
Route::get('/product', 'ProductController@productDisplay');
Route::get('/cart', 'HomeController@cart');
Route::get('/checkout', 'HomeController@checkout');
Route::get('/blog', 'HomeController@blog');
Route::get('/single', 'HomeController@single');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('authenticate', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

Route::post('/get_cart', 'ProductController@getCart');
Route::post('/product_check', 'ProductController@productCheck');
Route::get('/do_checkout', 'OrderController@doCheckOut');
Route::post('/check_auth', 'Auth\AuthController@checkAuth');
Route::post('/check_email', 'Auth\AuthController@checkEmail');
