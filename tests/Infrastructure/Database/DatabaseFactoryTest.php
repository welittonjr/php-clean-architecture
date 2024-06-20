<?php

use App\Infrastructure\Database\DatabaseFactory;
use Tests\TestCase;

class DatabaseFactoryTest extends TestCase
{
    public function testConnectionDatabase()
    {
        $app = $this->getApp();
        $container = $app->getContainer();
        $config = $container->get('config');

        $database = DatabaseFactory::create($config['database_test']);

        $this->assertInstanceOf(PDO::class, $database);
    }
}
