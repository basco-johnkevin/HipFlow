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


Route::when('*', 'csrf', array('post'));

Route::get('/', ['as' => 'laratodo.showHomePage', 'uses' => 'LaraTodo\LaraTodo\Controllers\LaraTodoController@showHomePage']);

Route::resource('users', 'LaraTodo\User\Controllers\UserController');
Route::resource('users.todos', 'LaraTodo\User\Controllers\UserTodoController');
Route::resource('sessions', 'LaraTodo\Session\Controllers\SessionController');
Route::resource('todos', 'LaraTodo\Todo\Controllers\TodoController');
