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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ExampleController@index');
Route::get('/create', 'ExampleController@create');
Route::post('/store', 'ExampleController@store');
Route::get('/show/{id}', 'ExampleController@show');
Route::get('/edit/{id}', 'ExampleController@edit');
Route::post('/update/{id}', 'ExampleController@update');