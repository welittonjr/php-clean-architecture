<?php

use App\Infrastructure\Adapters\AppAdapter;
use App\Infrastructure\Adapters\ContainerAdapter;

require __DIR__ . '/../vendor/autoload.php';

$containerAdapter = new ContainerAdapter();
$appAdapter = new AppAdapter();

$containerAdapter->loadDependencyInjection(
    __DIR__ . '/../config',
    ['dependences', 'repositories']
);

$appAdapter->setContainer($containerAdapter->getBuild());

$appAdapter->loadFileEnv(
    __DIR__ . '/../env',
    '.exemple.env'
);

$appAdapter->loadRoutes(
    __DIR__ . '/../config',
    'routes'
);

$appAdapter
    ->getApp()
    ->run();
