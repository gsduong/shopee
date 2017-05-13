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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin/login', 'Admin\AdminController@showFormLogin');
Route::post('/admin/login', 'Admin\AdminController@login');
Route::get('/admin/logout', 'Admin\AdminController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'check_admin'], function()
{
    Route::get('dashboard', 'Admin\AdminController@index');

    Route::get('dashboard/brand.html', 'Admin\BrandController@index');

    Route::post('brand/update', 'Admin\BrandController@update');
    Route::post('brand/create', 'Admin\BrandController@create');
    Route::delete('brand/delete/{id}', 'Admin\BrandController@delete');

    Route::get('dashboard/catalog/{id}.html', 'Admin\CatalogController@index');
    Route::delete('catalog/delete/{id}', 'Admin\CatalogController@delete');
    Route::post('catalog/create', 'Admin\CatalogController@create');
    Route::post('catalog/update', 'Admin\CatalogController@update');
});
