<?php namespace LaraTodo\LaraTodo\Controllers;

use BaseController;
use View;

class LaraTodoController extends BaseController {

    public function showHomePage()
    {
        return View::make('LaraTodo::laratodo.home');
    }

}
