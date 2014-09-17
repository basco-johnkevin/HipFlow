<?php namespace LaraTodo\Session\Forms;

use Auth;

class SessionForm
{
    public function create(array $inputs)
    {
        return Auth::attempt($inputs);
    }
}