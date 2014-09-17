<?php namespace LaraTodo\User\Controllers;

use BaseController;
use View;
use Input;
use User;
use Redirect;
use LaraTodo\User\Forms\UserForm;

class UserController extends BaseController {

    public function getCreate()
    {
        return View::make('User::user.create');
    }

    public function postCreate()
    {
        $userForm = new UserForm;

        if ($userForm->create(Input::all())) {
            return Redirect::route('user.getCreate');
        }

        return Redirect::route('user.getCreate')
            ->withInput()
            ->withErrors($userForm->errors());
    }

}
