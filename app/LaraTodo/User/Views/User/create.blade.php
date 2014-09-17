Create user page

<!-- @TODO: use raw html to make templates more designer friendly -->
{{ Form::open(array('route' => 'user.postCreate')) }}
    {{ Form::text('username') }}
    {{ Form::email('email') }}
    {{ Form::password('password') }}
    {{ Form::submit('Sign up') }}
{{ Form::close() }}

