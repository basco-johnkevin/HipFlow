<?php namespace LaraTodo\Todo\Forms;

use Todo;
use Validator;
use Auth;

class TodoForm
{
    protected $rules = [
        'title' => 'required'
    ];

    protected $validator;

    public function create(array $input)
    {
        if ( ! $this->validate($input)) {
            return false;
        }

        $todo = new Todo;
        $todo->title = $input['title'];
        $todo->description = $input['description'];
        $todo->user_id = Auth::user()->id;
        return $todo->save();
    }

    public function validate($data)
    {
        $this->validator = Validator::make($data, $this->rules);
        return $this->validator->passes();
    }

    public function errors()
    {
        return $this->validator->errors();
    }
}