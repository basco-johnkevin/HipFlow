@extends('layouts.master')

@section('content')

    <h3>Todo List</h3>

    @include('partials/form-errors')

    @foreach($todos as $todo)
        {{ $todo }}
    @endforeach

@stop