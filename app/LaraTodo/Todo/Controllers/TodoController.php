<?php namespace LaraTodo\Todo\Controllers;

use Illuminate\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use BaseController;
use LaraTodo\Todo\Forms\TodoForm;
use Todo;

class TodoController extends BaseController
{
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

    public function getList()
    {
        return $this->view->make('Todo::todo.list')
            ->with('todos', $this->todo->all());
    }

    public function getCreate()
    {
        return $this->view->make('Todo::todo.create');
    }

    public function postCreate()
    {
        if ($this->form->create($this->input->all())) {
            return $this->todo->all();
        }

        return $this->redirect->route('todo.getCreate')
            ->withInput()
            ->withErrors($this->form->errors());
    }

}
