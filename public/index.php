<?php

use App\Infrastructure\Framework\Adapters\AppAdapter;
use App\Infrastructure\Framework\Adapters\ContainerAdapter;

require __DIR__ . '/../vendor/autoload.php';

$containerAdapter = new ContainerAdapter();
$containerAdapter->loadDependencyInjection(__DIR__ . '/../config',['dependences', 'repositories']);

$appAdapter = new AppAdapter($containerAdapter);

$appAdapter->loadFileEnv(__DIR__ . '/../env',
    '.exemple.env'
);

$appAdapter->loadRoutes(
    __DIR__ . '/../config',
    'routes'
);
