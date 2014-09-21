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
        $this->createUser();
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