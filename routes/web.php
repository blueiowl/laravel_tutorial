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


Route::get('/', 'ExampleController@index');
Route::get('/create', 'ExampleController@create');
Route::post('/store', 'ExampleController@store');
Route::get('/show/{id}', 'ExampleController@show');
Route::get('/edit/{id}', 'ExampleController@edit');
Route::post('/update/{id}', 'ExampleController@update');
Route::delete('/delete/{id}', 'ExampleController@destroy');
Route::get('/search', 'ExampleController@search');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');