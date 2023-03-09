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

Route::group([
    'prefix' => 'tasks'
], function() {
    Route::get('/', 'TaskController@index')->name('index');
    Route::get('/create', 'TaskController@create')->name('create');
    Route::post('/store', 'TaskController@store')->name('store');
    Route::get('/new', 'TaskController@new')->name('new');
    Route::get('/{id}', 'TaskController@show')->name('show');
    Route::get('/{id}/edit', 'TaskController@edit')->name('edit');
    Route::put('/{id}/update', 'TaskController@update')->name('update');
    Route::put('/{id}/done', 'TaskController@done')->name('done');
    Route::delete('/{id}/delete', 'TaskController@delete')->name('delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
