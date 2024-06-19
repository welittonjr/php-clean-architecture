<?php

declare(strict_types=1);

use App\Infrastructure\Database\DatabaseFactory;
use Psr\Container\ContainerInterface;

return array(
    'config' => function () {
        return require __DIR__ . '/global.php';
    },
    PDO::class => function(ContainerInterface $containter) {
        return DatabaseFactory::create($containter->get('config'));
    }
);
