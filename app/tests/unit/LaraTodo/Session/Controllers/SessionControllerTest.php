<?php namespace Tests\Unit\LaraTodo\Session\Controllers;

use TestCase;

use User;

class SessionControllerTest extends TestCase
{
    public function testCreate()
    {
        $crawler = $this->client->request('GET', route('sessions.create'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testStoreShouldReturnAnErrorWhenCredentialsAreInvalid()
    {
        $inputs = [];
        $response = $this->call('POST', route('sessions.store', $inputs));
        $this->assertSessionHas('message');
    }

    public function testStoreShouldRedirectToCreateTodoPageOnSuccessfulLogin()
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

        $response = $this->call('POST', route('sessions.store', $inputs));
        $this->assertRedirectedToRoute('todos.create');
    }

}