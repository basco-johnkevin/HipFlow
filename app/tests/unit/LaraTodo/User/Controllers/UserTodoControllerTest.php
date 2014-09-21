<?php namespace Tests\Unit\LaraTodo\User\Controllers;

use TestCase;
use User;
use Hash;

class UserTodoControllerTest extends TestCase
{
    public function testIndexShouldRespondWithOk()
    {
        $user = new User;
        $user->username = 'johndoe25';
        $user->password = 'dummypassword';
        $user->email = 'johndoe25@gmail.com';
        $user->save();

        $crawler = $this->client->request('GET', route('users.todos.index', $user->username));
        $this->assertTrue($this->client->getResponse()->isOk());
    }


}