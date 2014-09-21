<?php namespace Tests\Unit\LaraTodo\User\Controllers;

use TestCase;
use User;
use Hash;
use Todo;

class UserTodoControllerTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $user = new User;
        $user->username = 'johndoe25';
        $user->password = 'dummypassword';
        $user->email = 'johndoe25@gmail.com';
        $user->save();
        $this->user = $user;
    }

    public function testIndexShouldRespondWithOk()
    {
        $crawler = $this->client->request('GET', route('users.todos.index', $this->user->username));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testIndexShouldShowUsernameOfTheTodoListOwner()
    {
        $crawler = $this->client->request('GET', route('users.todos.index', $this->user->username));
        $this->assertViewHas('usernameOfTodoListOwner', $this->user->username);
    }

    public function testIndexShouldShowTodos()
    {
        $todos = Todo::all();

        $crawler = $this->client->request('GET', route('users.todos.index', $this->user->username));
        $this->assertViewHas('todos', $todos);
    }


}