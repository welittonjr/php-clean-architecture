<?php

declare(strict_types=1);

namespace Tests;

use App\Infrastructure\Adapters\AppAdapter;
use App\Infrastructure\Adapters\ContainerAdapter;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;

class TestCase extends PHPUnit_TestCase
{
    public function getApp()
    {
        $containerAdapter = new ContainerAdapter();
        $appAdapter = new AppAdapter();

        $containerAdapter->loadDependencyInjection(__DIR__ . '/../config', ['dependencies', 'repositories']);

        $appAdapter->setContainer($containerAdapter->getBuild());

        $appAdapter->loadFileEnv(__DIR__ . '/../env', '.exemple.env');

        $appAdapter->loadRoutes(__DIR__ . '/../config', 'routes');

        return $appAdapter->getApp();
    }
}
