Create user page

<!-- @TODO: extract this to a macro or a template partial -->
@if( $errors->has() )
    <p>We encountered the following errors:</p>
    <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<!-- @TODO: use raw html to make templates more designer friendly -->
{{ Form::open(array('route' => 'user.postCreate')) }}
    {{ Form::text('username') }}
    {{ Form::email('email') }}
    {{ Form::password('password') }}
    {{ Form::password('password_confirmation') }}
    {{ Form::submit('Sign up') }}
{{ Form::close() }}

