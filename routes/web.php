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

Route::get('/', 'ImageController@index');

Route::get('/about', 'HomeController@about');

Route::get('/edit/{id}', 'ImageController@edit');

Route::get('/show/{id}','ImageController@show');

Route::get('create', 'ImageController@create');

Route::post('/store', 'ImageController@store');

Route::post('/update/{id}', 'ImageController@update');

Route::get('/delete/{id}', 'ImageController@delete');

