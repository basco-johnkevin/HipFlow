<?php namespace LaraTodo\LaraTodo\Controllers;

use Illuminate\View\Factory as ViewFactory;

use BaseController;

class LaraTodoController extends BaseController {

    protected $view;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    public function showHomePage()
    {
        return $this->view->make('LaraTodo::laratodo.home');
    }

}
