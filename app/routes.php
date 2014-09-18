<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'LaraTodo\LaraTodo\Controllers\LaraTodoController@showHomePage');

Route::get('/users/create', ['as' => 'user.getCreate', 'uses' => 'LaraTodo\User\Controllers\UserController@getCreate']);
Route::post('/users/create', ['as' => 'user.postCreate', 'uses' => 'LaraTodo\User\Controllers\UserController@postCreate']);
Route::get('/users/{username}/todos', ['as' => 'user.getList', 'uses' => 'LaraTodo\User\Controllers\UserTodoController@getList']);

Route::resource('sessions', 'LaraTodo\Session\Controllers\SessionController');

Route::get('/todos', ['as' => 'todo.getList', 'uses' => 'LaraTodo\Todo\Controllers\TodoController@getList']);
Route::get('/todos/create', ['as' => 'todo.getCreate', 'uses' => 'LaraTodo\Todo\Controllers\TodoController@getCreate']);
Route::post('/todos/create', ['as' => 'todo.postCreate', 'uses' => 'LaraTodo\Todo\Controllers\TodoController@postCreate']);
