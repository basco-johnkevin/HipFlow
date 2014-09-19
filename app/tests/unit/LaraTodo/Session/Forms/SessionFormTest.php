<?php namespace Tests\Unit\LaraTodo\Session\Forms;

use Illuminate\Auth\AuthManager;
use TestCase;

use LaraTodo\Session\Forms\SessionForm;
use User;

class SessionFormTest extends TestCase
{
    public function testCreateShouldReturnFalseWhenPassedWithInvalidCredentials()
    {
        $form = new SessionForm($this->app->make('auth'));
        $this->assertFalse($form->create([]));
    }

    public function testCreateShouldReturnTrueWhenPassedWithValidCredentials()
    {
        $rawPassword = 'dummypassword';
        $user = new User;
        $user->username = 'johndoe25';
        $user->password = $rawPassword;
        $user->email = 'johndoe25@gmail.com';
        $user->save();

        $inputs = [
            'username' => $user->username,
            'password' => $rawPassword
        ];

        $form = new SessionForm($this->app->make('auth'));
        $this->assertTrue($form->create($inputs));
    }

}