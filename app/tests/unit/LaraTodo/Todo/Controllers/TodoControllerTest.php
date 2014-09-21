<?php namespace Tests\Unit\LaraTodo\Todo\Controllers;

use TestCase;
use Todo;

class TodoControllerTest extends TestCase
{
    public function testIndexViewShouldHaveTodos()
    {
        $todos = Todo::all();
        $crawler = $this->client->request('GET', route('todos.index'));
        $this->assertViewHas('todos', $todos);
    }

    public function testCreateShouldRespondWithOk()
    {
        $crawler = $this->client->request('GET', route('todos.create'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testStoreShouldRedirectBackToCreateTodoPageOnInvalidInput()
    {
        $inputs = [];
        $response = $this->call('POST', route('todos.store', $inputs));
        $this->assertRedirectedToRoute('todos.create');
    }

    public function testStoreShouldReturnErrorsOnInvalidInput()
    {
        $inputs = [];
        $response = $this->call('POST', route('todos.store', $inputs));
        $this->assertSessionHas('errors');
    }

    public function testStoreShouldNotCreateAUserOnInvalidInput()
    {
        $inputs = [];
        $response = $this->call('POST', route('todos.store', $inputs));
        $todos = Todo::all();
        $this->assertEmpty($todos);
    }

    public function testStoreShouldBeAbleToSuccessfullyCreateATodoOnValidInput()
    {
        $this->createUser();
        $this->be($this->user);

        $inputs = [
            'title' => 'eat',
            'description' => ''
        ];

        $response = $this->call('POST', route('todos.store', $inputs));
        $todo = Todo::first();
        $this->assertNotNull($todo->title);
    }

}