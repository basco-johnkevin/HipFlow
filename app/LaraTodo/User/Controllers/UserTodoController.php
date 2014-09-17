<?php namespace LaraTodo\User\Controllers;

use BaseController;
use View;
use Todo;
use User;

class UserTodoController extends BaseController {

    public function getList($username)
    {
        $todos = User::whereUsername($username)->first()->todos;
        return View::make('User::todo.list')
            ->with('todos', $todos);
    }

}
