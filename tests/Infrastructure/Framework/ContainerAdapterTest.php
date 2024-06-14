<?php

declare(strict_types=1);

namespace Tests\Infrastructure\Framework;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Framework\ContainerAdapter;
use DI\Container;

class ContainerAdapterTest extends TestCase
{
    public function testLoadDependencyInjection()
    {
        $containerAdapter = new ContainerAdapter();
        $containerAdapter->loadDependencyInjection(__DIR__ . '/../../../config', ['dependencies']);

        $container = $containerAdapter->getBuild();
        $this->assertInstanceOf(Container::class, $container);
        $this->assertTrue($container->has('config'));

        $databaseConfig = $container->get('config')['database'];
        $this->assertIsArray($databaseConfig);
    }
}
