<?php namespace LaraTodo\User\Forms;

use User;
use Validator;

class UserForm
{
    protected $rules = [
        'username' => 'required|between:3,16|unique:users',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8',
        'email' => 'required|email|unique:users'
    ];

    protected $validator;

    // @TODO: add validation
    public function create(array $input)
    {
        if ( ! $this->validate($input)) {
            return false;
        }

        $user = new User;
        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        return $user->save();
    }

    public function validate($data)
    {
        $this->validator = Validator::make($data, $this->rules);
        return $this->validator->passes();
    }

    public function errors()
    {
        return $this->validator->errors();
    }
}