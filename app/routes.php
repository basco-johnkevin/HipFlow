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

Route::get('/sessions/create', ['as' => 'session.getCreate', 'uses' => 'LaraTodo\Session\Controllers\SessionController@getCreate']);
Route::post('/sessions/create', ['as' => 'session.postCreate', 'uses' => 'LaraTodo\Session\Controllers\SessionController@postCreate']);


Route::get('/todos/create', ['as' => 'todo.getCreate', 'uses' => 'LaraTodo\Todo\Controllers\TodoController@getCreate']);
Route::post('/todos/create', ['as' => 'todo.postCreate', 'uses' => 'LaraTodo\Todo\Controllers\TodoController@postCreate']);
