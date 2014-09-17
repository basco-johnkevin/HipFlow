<?php namespace LaraTodo\Session\Controllers;

use BaseController;
use View;
use Input;
use Redirect;
use Auth;
use LaraTodo\Session\Forms\SessionForm;

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

        $form = new SessionForm;

        if ($form->create($params)) {
            return 'Successfully logged-in';
        }

        return Redirect::route('session.getCreate')
            ->with('message', 'Wrong username or password');
    }

}
