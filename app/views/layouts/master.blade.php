<html>
    <body>
        @if (Session::has('message'))
            <div>{{ Session::get('message') }}</div>
        @endif

        @yield('content')
    </body>
</html>