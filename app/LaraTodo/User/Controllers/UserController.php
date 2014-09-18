<?php namespace LaraTodo\User\Controllers;

use Illuminate\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use BaseController;
use LaraTodo\User\Forms\UserForm;

class UserController extends BaseController {

    protected $view;
    protected $input;
    protected $redirect;
    protected $form;

    public function __construct(ViewFactory $view,
                                Request $input,
                                Redirector $redirect,
                                UserForm $form)
    {
        $this->view = $view;
        $this->input = $input;
        $this->redirect = $redirect;
        $this->form = $form;
    }

    public function getCreate()
    {
        return $this->view->make('User::user.create');
    }

    public function postCreate()
    {
        if ($this->form->create($this->input->all())) {
            return $this->redirect->route('user.getCreate');
        }

        return $this->redirect->route('user.getCreate')
            ->withInput()
            ->withErrors($this->form->errors());
    }

}
