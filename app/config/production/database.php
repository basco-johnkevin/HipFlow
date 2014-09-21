
<?php

$url = parse_url(getenv("DATABASE_URL"));

return array(

    'default' => 'pgsql',

    'connections' => array(

        'pgsql' => array(
            'driver'   => 'pgsql',
            'host'     => $url["host"],
            'database' =>  substr($url["path"], 1),
            'username' => $url["user"],
            'password' => $url["password"],
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ),

    ),

);
