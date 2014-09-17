<?php namespace LaraTodo\LaraTodo\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use View;

class Application extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::addNamespace('LaraTodo', __DIR__.'/../Views/');
    }
}