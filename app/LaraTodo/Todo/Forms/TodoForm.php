<?php namespace LaraTodo\Todo\Forms;

use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Auth\AuthManager;

use Todo;

class TodoForm
{
    protected $rules = [
        'title' => 'required'
    ];

    protected $validatorFactory;
    protected $auth;
    protected $todo;

    public function __construct(ValidatorFactory $validatorFactory,
                                AuthManager $auth,
                                Todo $todo)
    {
        $this->validatorFactory = $validatorFactory;

        $this->auth = $auth;
        $this->todo = $todo;
    }

    public function create(array $input)
    {
        if ( ! $this->validate($input)) {
            return false;
        }

        $this->todo->title = $input['title'];
        $this->todo->description = $input['description'];
        $this->todo->user_id = $this->auth->user()->id;
        return $this->todo->save();
    }

    public function validate($data)
    {
        $this->validator = $this->validatorFactory->make($data, $this->rules);
        return $this->validator->passes();
    }

    public function errors()
    {
        return $this->validator->errors();
    }
}