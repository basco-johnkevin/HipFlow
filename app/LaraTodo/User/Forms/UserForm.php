<?php namespace LaraTodo\User\Forms;

use User;

class UserForm
{
    // @TODO: add validation
    public function create(array $input)
    {
        $user = new User;
        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        return $user->save();
    }
}