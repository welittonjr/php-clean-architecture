<?php

declare(strict_types=1);

namespace Tests\Infrastructure\Adapters;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Adapters\AppAdapter;
use DI\Container;
use Slim\App;

class AppAdapterTest extends TestCase
{
    public function testLoadRoutes()
    {
        $appAdapter = new AppAdapter();

        $container = new Container();
        $appAdapter->setContainer($container);

        $path = __DIR__ . '/../../../config';
        $file = 'routes';
        $appAdapter->loadRoutes($path, $file);

        $app = $appAdapter->getApp();
        $this->assertInstanceOf(App::class, $app);

        ob_start(); // Capture a saída para evitar que o aplicativo envie a resposta HTTP
        $app->run();
        $output = ob_get_clean(); // Obtenha a saída do aplicativo

        // Verifique se não há erros na saída do aplicativo
        $this->assertStringNotContainsString('Internal Server Error', $output);
        $this->assertStringNotContainsString('Error', $output);
    }
}
