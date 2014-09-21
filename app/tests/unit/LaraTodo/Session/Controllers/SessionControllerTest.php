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
        $this->createUser();

        $inputs = [
            'username' => $this->user->username,
            'password' => $this->rawPassword
        ];

        $response = $this->call('POST', route('sessions.store', $inputs));
        $this->assertRedirectedToRoute('todos.create');
    }

}