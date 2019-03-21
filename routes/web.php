<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('/tasks', 'TaskController');

Route::GET('/tasks', 'TaskController@index')->name('tasks.index');

Route::GET('/tasks/changeStatus/{task}/{mode}', 'TaskController@changeStatus')->name('tasks.changeStatus');

Route::GET('/tasks/loadView/{mode}', 'TaskController@loadView')->name('tasks.loadView');

Route::PUT('tasks/{mode}', 'TaskController@store')->name('tasks.store');

Route::GET('tasks/{task}/edit/{mode}', 'TaskController@edit')->name('tasks.edit');

Route::PUT('tasks/{task}/{mode}', 'TaskController@update')->name('tasks.update');

Route::DELETE('tasks/{task}/{mode}', 'TaskController@destroy')->name('tasks.destroy');