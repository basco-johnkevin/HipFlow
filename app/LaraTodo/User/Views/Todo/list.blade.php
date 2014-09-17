@extends('layouts.master')

@section('content')

    <h3>Todos created by: {{ Auth::user()->username }}</h3>

    @include('partials/form-errors')

    @foreach($todos as $todo)
        {{ $todo }}
    @endforeach

@stop