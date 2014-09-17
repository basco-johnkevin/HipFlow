<?php

class Todo extends Eloquent
{
    public function author()
    {
        return $this->belongsTo('User');
    }
}