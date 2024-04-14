<?php

declare(strict_types=1);

namespace Tests\Infrastructure\Adapters;

use Slim\App;
use Tests\TestCase;

class AppAdapterTest extends TestCase
{
    public function testLoadRoutes()
    {
        
        $app = $this->getApp();
        $this->assertInstanceOf(App::class, $app);

        ob_start(); // Capture a saída para evitar que o aplicativo envie a resposta HTTP
        $app->run();
        $output = ob_get_clean(); // Obtenha a saída do aplicativo

        // Verifique se não há erros na saída do aplicativo
        $this->assertStringNotContainsString('Internal Server Error', $output);
        $this->assertStringNotContainsString('Error', $output);
    }
}
