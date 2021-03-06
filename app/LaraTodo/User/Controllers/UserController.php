<?php namespace LaraTodo\User\Controllers;

use Illuminate\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use BaseController;
use LaraTodo\User\Forms\UserForm;

class UserController extends \BaseController {

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


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view->make('User::user.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if ($this->form->create($this->input->all())) {
            return $this->redirect->route('sessions.create');
        }

        return $this->redirect->route('users.create')
            ->withInput()
            ->withErrors($this->form->errors());
    }

}
