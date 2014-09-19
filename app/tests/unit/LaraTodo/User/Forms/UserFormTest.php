<?php namespace Tests\Unit\LaraTodo\User\Forms;

use Illuminate\Auth\AuthManager;
use TestCase;

use LaraTodo\User\Forms\UserForm;
use User;

class UserFormTest extends TestCase
{
    public function testCreateShouldReturnFalseWhenPassedWithAnEmptyArray()
    {
        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create([]));
    }

    public function testCreateShouldReturnTrueWhenPassedWithValidInputs()
    {
        $inputs = [
            'username' => 'johndoe25',
            'password' => 'dummypassword',
            'password_confirmation' => 'dummypassword',
            'email' => 'johndoe25@gmail.com'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertTrue($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenEmailIsInvalid()
    {
        $inputs = [
            'username' => 'johndoe25',
            'password' => 'dummypassword',
            'password_confirmation' => 'dummypassword',
            'email' => 'invalid email'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenPasswordIsLessThan8Characters()
    {
        $inputs = [
            'username' => 'johndoe25',
            'password' => '1234567',
            'password_confirmation' => '1234567',
            'email' => 'johndoe25@gmail.com'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenPasswordDoesntMatchPasswordConfirmation()
    {
        $inputs = [
            'username' => 'johndoe25',
            'password' => 'dummypassword',
            'password_confirmation' => 'imdifferent',
            'email' => 'johndoe25@gmail.com'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenUsernameIsLessThan3Characters()
    {
        $inputs = [
            'username' => 'aa',
            'password' => 'dummypassword',
            'password_confirmation' => 'dummypassword',
            'email' => 'johndoe25@gmail.com'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenUsernameIsMoreThan16Characters()
    {
        $inputs = [
            'username' => 'averylongusernameaverylongusername',
            'password' => 'dummypassword',
            'password_confirmation' => 'dummypassword',
            'email' => 'johndoe25@gmail.com'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenEmailIsAlreadyUsed()
    {
        $rawPassword = 'dummypassword';
        $user = new User;
        $user->username = 'johndoe25';
        $user->password = $rawPassword;
        $user->email = 'johndoe25@gmail.com';
        $user->save();

        $inputs = [
            'username' => 'ken25',
            'password' => 'dummypassword',
            'password_confirmation' => 'dummypassword',
            'email' => $user->email
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

    public function testCreateShouldReturnFalseWhenUsernameIsAlreadyUsed()
    {
        $rawPassword = 'dummypassword';
        $user = new User;
        $user->username = 'johndoe25';
        $user->password = $rawPassword;
        $user->email = 'johndoe25@gmail.com';
        $user->save();

        $inputs = [
            'username' => $user->username,
            'password' => 'dummypassword',
            'password_confirmation' => 'dummypassword',
            'email' => 'ken@gmail.com'
        ];

        $form = new UserForm($this->app->make('validator'), new User);
        $this->assertFalse($form->create($inputs));
    }

}