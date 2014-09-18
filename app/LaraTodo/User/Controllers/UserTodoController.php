<?php namespace LaraTodo\User\Controllers;

use Illuminate\View\Factory as ViewFactory;
use Illuminate\Http\Request;

use BaseController;
use User;

class UserTodoController extends BaseController {

    protected $view;
    protected $input;
    protected $user;

    public function __construct(ViewFactory $view,
                                Request $input,
                                User $user)
    {
        $this->view = $view;
        $this->input = $input;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($username)
    {
        $todos = $this->user->getTodoListByUsername($username);
        return $this->view->make('User::todo.list')
            ->with('todos', $todos);
    }


}
