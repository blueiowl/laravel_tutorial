<?php

Route::get('/', function () {
    $user = \Auth::user();
    if(!$user) return view('top', ['title' => 'トップ']);
    return redirect()->route('tasks.new');
});

Route::group([
    'prefix' => 'error',
], function() {
    Route::get('/auth', function() {
        return response()->view('error.auth', ['title' => '認証エラー'], 401);
    })->name('error.auth');
});

Route::group([
    'prefix' => 'tasks'
], function() {
    Route::get('/', 'TaskController@index')->name('tasks.index');
    Route::resource('/', 'TaskController');
    Route::post('/', 'TaskController@index')->name('tasks.index');
    Route::get('/clear', 'TaskController@clear')->name('tasks.clear');
    Route::get('/create', 'TaskController@create')->name('tasks.create');
    Route::post('/store', 'TaskController@store')->name('tasks.store');
    Route::get('/new', 'TaskController@new')->name('tasks.new');
    Route::get('/{id}', 'TaskController@show')->name('tasks.show');
    Route::get('/{id}/edit', 'TaskController@edit')->name('tasks.edit');
    Route::post('/{id}/update', 'TaskController@update')->name('tasks.update');
    Route::post('/{id}/done', 'TaskController@done')->name('tasks.done');
    Route::post('/{id}/delete', 'TaskController@delete')->name('tasks.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function() {
    return response()->view('error.other', ['title' => '予期せぬエラー'], 404);
});
