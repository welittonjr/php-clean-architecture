<?php

return [

    'database' => [
        'host' => getenv('DATABASE_HOST'),
        'port' => getenv('DATABASE_PORT'),
        'name' => getenv('DATABASE_NAME'),
        'user' => getenv('DATABASE_USER'),
        'pass' => getenv('DATABASE_PASS'),
        'driver' => getenv('DATABASE_DRIVER'),
    ],
    'database_test' => [
        'name' => getenv('DATABASE_TEST_NAME'),
        'driver' => getenv('DATABASE_TEST_DRIVER')
    ]
];
