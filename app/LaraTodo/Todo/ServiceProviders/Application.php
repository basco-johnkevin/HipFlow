<?php namespace LaraTodo\Todo\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use View;

class Application extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::addNamespace('Todo', __DIR__.'/../Views/');
    }
}