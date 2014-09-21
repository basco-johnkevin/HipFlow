@extends('layouts.master')

@section('content')

    <h3>Todos created by: {{ $usernameOfTodoListOwner }}</h3>

    @include('partials/form-errors')

    @foreach($todos as $todo)
        {{ $todo }}
    @endforeach

@stop