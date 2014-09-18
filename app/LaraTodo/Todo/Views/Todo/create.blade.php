@extends('layouts.master')

@section('content')

    <h3>Create Todo</h3>

    @include('partials/form-errors')

    <form method="POST" action="{{ route('todos.store') }}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="title" type="text">
        <textarea name="description"></textarea>
        <input type="submit" value="Create">
    </form>

@stop