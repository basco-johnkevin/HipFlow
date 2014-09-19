<?php namespace Tests\Unit\LaraTodo\LaraTodo\Controllers;

use TestCase;

class LaraTodoControllerTest extends TestCase
{
    public function testShowHome()
    {
        $crawler = $this->client->request('GET', route('laratodo.showHomePage'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

}