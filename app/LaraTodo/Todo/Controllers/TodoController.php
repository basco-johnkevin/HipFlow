<?php namespace LaraTodo\Todo\Controllers;

use BaseController;
use View;
use Input;
use Todo;
use Auth;
use Redirect;
use LaraTodo\Todo\Forms\TodoForm;

class TodoController extends BaseController {

    public function getCreate()
    {
        return View::make('Todo::todo.create');
    }

    public function postCreate()
    {
        $form = new TodoForm;

        if ($form->create(Input::all())) {
            return Todo::all();
        }

        return Redirect::route('todo.getCreate')
            ->withInput()
            ->withErrors($form->errors());
    }

}
