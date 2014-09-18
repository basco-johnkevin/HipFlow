<?php namespace LaraTodo\Todo\Controllers;

use Illuminate\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use BaseController;
use LaraTodo\Todo\Forms\TodoForm;
use Todo;

class TodoController extends BaseController {

    protected $view;
    protected $input;
    protected $redirect;
    protected $form;
    protected $todo;

    public function __construct(ViewFactory $view,
                                Request $input,
                                Redirector $redirect,
                                TodoForm $form,
                                Todo $todo)
    {
        $this->view = $view;
        $this->input = $input;
        $this->redirect = $redirect;
        $this->form = $form;
        $this->todo = $todo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->view->make('Todo::todo.list')
            ->with('todos', $this->todo->all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view->make('Todo::todo.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if ($this->form->create($this->input->all())) {
            return $this->todo->all();
        }

        return $this->redirect->route('todos.create')
            ->withInput()
            ->withErrors($this->form->errors());
    }


}
