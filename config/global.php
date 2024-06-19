<?php

return [

    'database' => [
        'host' => getenv('DB_HOST'),
        'port' => getenv('DB_PORT'),
        'name' => getenv('DB_NAME'),
        'user' => getenv('DB_USER'),
        'pass' => getenv('DB_PASS'),
        'driver' => getenv('DB_DRIVER'),
        'test' => getenv('DB_TEST')
    ]
];
