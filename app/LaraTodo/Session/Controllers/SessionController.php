<?php namespace LaraTodo\Session\Controllers;

use BaseController;
use View;
use Input;
use Redirect;
use Auth;

class SessionController extends BaseController {

    public function getCreate()
    {
        return View::make('Session::session.create');
    }

    public function postCreate()
    {
        $params = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($params)) {
            return 'Successfully logged-in';
        }

        return Redirect::route('session.getCreate')
            ->with('message', 'Wrong username or password');
    }

}
