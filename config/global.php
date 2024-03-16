<?php

return [

    'redis' => [
        'host' => getenv('REDIS_HOST'),
        'port' => getenv('REDIS_PORT'),
    ],
    'aws' => [
        's3' => [
            'region' => getenv('AWS_S3_REGION'),
            'bucket' => getenv('AWS_S3_BUCKET'),
            'prefix_path' => getenv('AWS_S3_PREFIX_PATH'),
            'version' => getenv('AWS_S3_VERSION'),
        ],
        'sqs' => [
            'host' => getenv('AWS_SQS_HOST'),
            'version' => getenv('AWS_SQS_VERSION'),
            'region' => getenv('AWS_SQS_REGION'),
            'key' => getenv('AWS_SQS_KEY'),
            'secret' => getenv('AWS_SQS_SECRET'),
        ]
    ]
];
